<?PHP
/*-----------------------------------------------------------------------------
-	This file contains proprietary and confidential information from WebAssist.com
-	corporation.  Any unauthorized reuse, reproduction, or modification without
-	the prior written consent of WebAssist.com is strictly prohibited.
-
-	Copyright 2005-2007 WebAssist.com Corporation.  All rights reserved.
------------------------------------------------------------------------------*/

if(!session_id()){
session_start();
}

/*
the FilterDef object is used to create whereclauses for database queries
it works for a number of database types
*/
class FilterDef {
  var $ObjectType = "WC";
  var $dateSeparator="'";
  var $wildCard="%";
  var $whereClause="";
  var $orderBy = "";
  var $dbtype = "";
  var $hasWhere = false;
  
  //the initialize function sets any of the properties based on the database type
  function initializeQueryBuilder($tType,$hWhere) {
  	$this->dbtype = $tType;
    !$this->hasWhere = $hWhere;
    if ($tType == "ACCESS") {
      $this->dateSeparator="#";
    }
    if ($tType == "ORACLE") {
      $this->dateSeparator="TO_DATE('";
    }
    if ($tType == "MYSQL")     {
      $this->dateSeparator="\"";
    }
  }

  //add a comparison argument from an edit box
  function addComparisonFromEdit($Column,$EditName,$Logical,$Comparison,$FieldType) {
    $theValue = WA_DBS_PostOrGetField($EditName);
    if (isset($theValue) && $theValue != "undefined" && $theValue != "") {
      $this->addComparison($Column,$theValue,$Logical,$Comparison,$FieldType);
    }
  }

  //add a comparison argument from a check box
  function addComparisonFromCheck($Column,$CheckName,$TrueVal,$FalseVal,$Logical,$Comparison,$NComparison,$FieldType) {
    $theValue = WA_DBS_PostOrGetField($CheckName);
    if (isset($theValue) && $theValue != "undefined" && $theValue != "") {
      $this->addComparison($Column,$TrueVal,$Logical,$Comparison,$FieldType);
    }
    else {
      if (($FieldType == 1 && $FalseVal != "") || $FieldType != 1) {
	      $this->addComparison($Column,$FalseVal,$Logical,$NComparison,$FieldType);
      }
    }
  }

  //add a comparison argument from a dropdown or multi-select list
  function addComparisonFromList($Column,$ListName,$Logical,$Comparison,$FieldType) {
    $theSeparator="'";
    $theComparison="=";
    $theFirstWild="";
    $theSecondWild="";
    $theComparison=$Comparison;

    if ($FieldType==1) {
      $theSeparator="";
    }
    if ($FieldType==2) {
      $theSeparator=$this->dateSeparator;
    }
    if ($Comparison=="Begins With" || $Comparison=="Ends With" || $Comparison=="Includes") {
      $theComparison="LIKE";
    }
    if ($Comparison=="Begins With" || $Comparison=="Includes") {
      $theSecondWild=$this->wildCard;
    }
    if ($Comparison=="Ends With" || $Comparison=="Includes") {
      $theFirstWild=$this->wildCard;
    }

    $theValue = WA_DBS_PostOrGetField($ListName);
    if (isset($theValue) && $theValue != "undefined" && $theValue != "") {
      $ListValues = $theValue;
      if (!is_array($theValue))  {
       $ListValues = explode(", ", $theValue);
      }
      for ($x=0; $x<sizeof($ListValues); $x++) {
        if ($this->whereClause=="" && ($Logical == "" || !$this->hasWhere)) {
          $this->whereClause="WHERE ";
        }
        if ($x==0) {
          if ($this->whereClause!="WHERE ") {
            $this->whereClause=$this->whereClause." ".$Logical;
          }
          $this->whereClause=$this->whereClause." (".$this->CreateComparison($Column,$theFirstWild.$ListValues[$x].$theSecondWild,$theComparison,$theSeparator,$FieldType,$this->dbtype);
        }
        else {
          $this->addComparison($Column,$ListValues[$x],"OR",$Comparison,$FieldType);
        }
      }
      if ($x!=0) {
        $this->whereClause=$this->whereClause.")";
      }
    }
  }

  //add a keyword comparison argument from a dropdown or multi-select list
  function keywordComparison($Columns,$Values,$Logical,$Comparison,$ImpliedAND,$ImpliedOR,$StartEnc,$EndEnc,$FieldType) {
    if (isset($Values) && str_replace(" ", "", $Values) != "") {
      if ($this->whereClause==="" && ($Logical == "" || !$this->hasWhere)) {
        $this->whereClause = "WHERE ";
      }
      else {
        $this->whereClause = $this->whereClause." ".$Logical." ";
      }
      $this->whereClause = $this->whereClause.$this->CreateJoinedComparison($Columns,$Values,$Comparison,$ImpliedAND,$ImpliedOR,$StartEnc,$EndEnc,$FieldType,$this->wildCard,$this->dateSeparator,$this->dbtype);
    }
  }

  //add a break up entry on implied and and or and build the resulting arguments
  function CreateJoinedComparison($Columns,$Values,$Comparison,$ImpliedAND,$ImpliedOR,$StartEnc,$EndEnc,$FieldType,$Wild,$DateSep,$dbtype) {
    $ImpliedAND = urldecode($ImpliedAND);
    $ImpliedOR  = urldecode($ImpliedOR);
    $StartEnc = urldecode($StartEnc);
    $EndEnc   = urldecode($EndEnc);
    $Values   = (get_magic_quotes_gpc()) ? stripslashes($Values) : $Values;
    if ($Values != "" && $StartEnc != "") {
      $sEncPos    = strpos($Values, $StartEnc);
      $eEncPos    = strpos($Values, $EndEnc);
      $taStartEnc = $ImpliedAND.$StartEnc;
      $toStartEnc = $ImpliedOR.$StartEnc;
      $taEndEnc   = $EndEnc.$ImpliedAND;
      $toEndEnc   = $EndEnc.$ImpliedOR;
      $tVal       = "";
      while ($Values != "" && ($sEncPos !== false) && ($eEncPos !== false)) {
        $continueEnc = false;
        if ($sEncPos != 0) {
          $tasEncPos = strpos($Values, $taStartEnc);
          $tosEncPos = strpos($Values, $toStartEnc);
          if (($tasEncPos !== false) && ($tosEncPos === false || $tosEncPos > $tasEncPos)) {
            $tVal  .= substr($Values, 0, $tasEncPos) . $ImpliedAND;
            $Values = substr($Values, $tasEncPos + strlen($taStartEnc));
            $continueEnc = true;
          }
          else if (($tosEncPos !== false) && ($tasEncPos === false || $tasEncPos > $tosEncPos)) {
            $tVal  .= substr($Values, 0, $tosEncPos) . $ImpliedOR;
            $Values = substr($Values, $tosEncPos + strlen($toStartEnc));
            $continueEnc = true;
          }
        }
        else {
          $Values = substr($Values, strlen($StartEnc));
          $continueEnc = true;
        }
        if ($continueEnc) {
          $eEncPos     = strpos($Values, $EndEnc);
          $continueEnc = false;
          if ($eEncPos != strlen($Values) - strlen($EndEnc)) {
            $taeEncPos = strpos($Values, $taEndEnc);
            $toeEncPos = strpos($Values, $toEndEnc);
            if (($taeEncPos !== false) && ($toeEncPos === false || $toeEncPos > $taeEncPos)) {
              $encVal      = substr($Values, 0, $taeEncPos);
              $Values      = substr($Values, $taeEncPos + strlen($EndEnc));
              $continueEnc = true;
            }
            else if (($toeEncPos !== false) && ($taeEncPos === false || $taeEncPos > $toeEncPos)) {
              $encVal      = substr($Values, 0, $toeEncPos);
              $Values      = substr($Values, $toeEncPos + strlen($EndEnc));
              $continueEnc = true;
            }
          }
          else {
            $encVal      = substr($Values, 0, strlen($Values)-strlen($EndEnc));;
            $Values      = "";
            $continueEnc = true;
          }
          if ($continueEnc) {
            $tVal .= str_replace($ImpliedAND, "§", str_replace($ImpliedOR, "¨", $encVal));
          }
          else {
            $tVal  .= $StartEnc.substr($Values, 0, strpos($Values, $EndEnc)).$EndEnc;
            $Values = substr($Values, strpos($Values, $EndEnc) + strlen($EndEnc));
          }
        }
        else {
          $tVal = $Values;
          $Values = "";
        }
        $sEncPos = strpos($Values, $StartEnc);
        $eEncPos = strpos($Values, $EndEnc);
      }
      $tVal  .= $Values;
      $Values = $tVal;
    }
    $ColumnArray = $Columns;
    $KeyWhere="";
    $AndArray = explode($ImpliedAND, $Values);
    $theSeparator="'";
    $theFirstWild="";
    $theSecondWild="";
    if ($FieldType==1) {
      $theSeparator="";
    }
    if ($FieldType==2) {
      $theSeparator=$DateSep;
    }
    if ($Comparison=="Begins With" || $Comparison=="Includes") {
      $theSecondWild=$Wild;
    }
    if ($Comparison=="Ends With" || $Comparison=="Includes") {
      $theFirstWild=$Wild;
    }
    if ($Comparison=="Begins With" || $Comparison=="Ends With" || $Comparison=="Includes") {
      $Comparison="LIKE";
    }
    for ($z=0; $z<sizeof($AndArray); $z++) {
      $OrArray = explode($ImpliedOR, $AndArray[$z]);
      for ($a=0; $a<sizeof($OrArray); $a++) {
        $OrArray[$a] = str_replace("§", $ImpliedAND, str_replace("¨", $ImpliedOR, $OrArray[$a]));
        if (!(($z==0)&&($a==0))) {
          if ($a==0) {
            $KeyWhere=$KeyWhere." AND ";
          }
          else {
            $KeyWhere=$KeyWhere." OR ";
          }
        }
        for ($x=0; $x<sizeof($ColumnArray); $x++) {
          if ($x==0) {
            $KeyWhere=$KeyWhere."(".$this->CreateComparison($ColumnArray[$x],$theFirstWild.$OrArray[$a].$theSecondWild,$Comparison,$theSeparator,$FieldType,$dbtype);
          }
          else {
            $KeyWhere=$KeyWhere." OR ".$this->CreateComparison($ColumnArray[$x],$theFirstWild.$OrArray[$a].$theSecondWild,$Comparison,$theSeparator,$FieldType,$dbtype);
          }
        }
        if ($x!=0) {
          $KeyWhere=$KeyWhere.")";
        }
        if (!(($z==0)&&($a==0))) {
          $KeyWhere="(".$KeyWhere.")";
        }
      }
    }
    return $KeyWhere;
  }

  //add a comparison to the whereclause
  function addComparison($Column,$Value,$Logical,$Comparison,$FieldType) {
    $theSeparator="'";
    $theFirstWild="";
    $theSecondWild="";
    $theComparison=$Comparison;

    if ($FieldType==1) {
      $theSeparator="";
    }
    if ($FieldType==2) {
      $theSeparator=$this->dateSeparator;
    }
    if ($Comparison=="Begins With" || $Comparison=="Ends With" || $Comparison=="Includes") {
      $theComparison="LIKE";
    }
    if ($Comparison=="Begins With" || $Comparison=="Includes") {
      $theSecondWild=$this->wildCard;
    }
    if ($Comparison=="Ends With" || $Comparison=="Includes") {
      $theFirstWild=$this->wildCard;
    }
    if ($Column!="" && $Value!="") {
      if ($this->whereClause == "" && ($Logical == "" || !$this->hasWhere)) {
        $this->whereClause="WHERE ";
      }
      else {
        $this->whereClause=$this->whereClause." ".$Logical." ";
      }
      $this->whereClause=$this->whereClause.$this->CreateComparison($Column,$theFirstWild.$Value.$theSecondWild,$theComparison,$theSeparator,$FieldType,$this->dbtype);
    }
  }

  //build the database-specific argument to the whereclause
  function CreateComparison($Column,$Value,$Comparison,$Separator,$CompType,$dbtype) {
    $theValue="$Value";
    if ($Separator=="'") {
      $theValue=str_replace("'", "''", $theValue);
    }
    if ($CompType == 1) {
   	 //numeric
	 $theValue = "".floatval($theValue);
    }
   else if ($CompType==2) {
   	 //date or checkbox value
   	 $theValue = WA_DBS_clearOutSQLKeywords($theValue);
    }
    $theComparison="=";
    $theSeparator=$Separator;

    if ($Comparison=="=" || $Comparison=="<>" || $Comparison=="<" || $Comparison=="<=" || $Comparison==">=" || $Comparison==">" || $Comparison=="IS" || $Comparison=="IS NOT" || $Comparison=="LIKE")    {
      $theComparison=$Comparison;
    }
    if ($Comparison=="IS" || $Comparison=="IS NOT")     {
      $theSeparator="";
    }
    if (isset($dbtype)) {
      if ($dbtype == "ORACLE") {
        if ($CompType == 2)     {
          return "(".WA_DBS_cleanUpColumnName($Column)." ".$theComparison." ".$theSeparator.$theValue."', 'MM/DD/YY'))";
        }
        else     {
          return "(".WA_DBS_cleanUpColumnName($Column)." ".$theComparison." ".$theSeparator.$theValue.$theSeparator.")";
        }
      }
      if ($dbtype == "MYSQL")     {
        if ($CompType == 2)      {
          return "(".WA_DBS_cleanUpColumnName($Column)." ".$theComparison." ".$theSeparator.getMySQLDateORDIE($theValue).$theSeparator.")";
        }
        else      {
          return "(".WA_DBS_cleanUpColumnName($Column)." ".$theComparison." ".$theSeparator.$theValue.$theSeparator.")";
        }
      }
    }
    return "(".WA_DBS_cleanUpColumnName($Column)." ".$theComparison." ".$theSeparator.$theValue.$theSeparator.")";
  }
}

//appends a time of 23:59:59 to a date to signify the end of a day
function WAQB_getEndDate($endate)     {
  if (isset($endate) && $endate != "undefined" && $endate != "")     {
    if (strtotime($endate) !== -1)     {
      $endate = "$endate";
      if (strpos($endate, ":") === false)    {
        $endate = $endate." 23:59:59";
      }
      return $endate;
    }
  }
  return "";
}

//strips currency markup
function WADS_stripCurrency($currencyField)     {
  if (isset($currencyField) && $currencyField != "undefined" && $currencyField != "")     {
    if (is_numeric($currencyField))     {
      return $currencyField;
    }
    else {
      return preg_replace("/[^\d\.]/", "", $currencyField);
    }
  }
  return "";
}

//formats a date for MySQL
function getMySQLDateORDIE($theDateString)      {
  $theDate = strtotime($theDateString);
  return date("Y-m-d H:i:s", $theDate);
}

//puts the whereclause into the source at the proper position
function setQueryBuilderSource(&$RS_Source,$QB,$useOr)      {
  $theClause = "";
  if ($QB->ObjectType == "WC") {
    $theClause = $QB->whereClause;
    if(strlen($theClause)==0){
      return;
    }	
    $theConnector = ($useOr) ? "OR" : "AND";
    $theIndex = findSourceInsertIndex($RS_Source);
    if($theIndex[1]){
      $theClause = str_replace("WHERE ", $theConnector, $theClause);
    }
    else{
      $theClause = "WHERE ".preg_replace("/^\s*(AND|OR)\s*/", "", $theClause);
    }
  }
  else if ($QB->ObjectType == "OB") {
    $theIndex = array();
    $theIndex[0] = strlen($RS_Source);
    $theClause = $QB->getFinalClause($RS_Source);
  }
  if ($theClause != "") {
    $RS_Source = substr($RS_Source, 0, $theIndex[0])." ".$theClause." ".substr($RS_Source, $theIndex[0]);
  }
}

// Sort Object Definition
class WADA_SortObject {
  //private
  var $ObjectType = "OB";
  var $MajorDelimiter = "§§§";
  var $MinorDelimiter = "^";
  //public
  var $ColumnList = "";
  var $SortOrderList = "";
  var $DefaultSort = "";
  var $ToggleOn = false;
  var $SetToClause = "";
  var $ToggleClause = "";
  var $FinalOrderClause = "";
  
  function WA_SortObject() {
  }
  
  function getDefaultSetToClause() {
    return $this->getSetToClause($this->ColumnList, $this->SortOrderList);
  }
  
  function getSetToClause($tCols, $tOrders) {
    return $tCols . $this->MajorDelimiter . $tOrders;
  }
  
  function initialize() {
    if ($this->ColumnList != "" && substr($this->ColumnList,0,1) != "§" && $this->SortOrderList != "" && substr($this->SortOrderList,0,1) != "§" && $this->SetToClause != "") {
      if ($this->ToggleClause != "") {
        $tcArr = explode($this->MajorDelimiter, $this->ToggleClause);
        $stArr = explode($this->MajorDelimiter, $this->SetToClause);
        if (sizeof($tcArr) == 2 && sizeof($stArr) == 2 && $tcArr[0] == $stArr[0]) {
          $tsoArr = explode($this->MinorDelimiter, $tcArr[1]);
          $ssoArr = explode($this->MinorDelimiter, $stArr[1]);
          if (WADA_getSortAscendingDescending($tsoArr[0]) == "ASC") {
            $ssoArr[0] = "D";
          }
          else {
            $ssoArr[0] = "A";
          }
	     $this->SetToClause = $this->getSetToClause($stArr[0], implode($this->MinorDelimiter, $ssoArr));
	   }
      }
    }
  }
  
  function getFinalClause($tSrc) {
    if ($this->SetToClause != "" && substr($this->SetToClause,0,1) != "§") {
      $obArr = explode($this->MajorDelimiter, $this->SetToClause);
      $colArr = explode($this->MinorDelimiter, $obArr[0]);
      $srtArr = explode($this->MinorDelimiter, $obArr[1]);
      $retStr = "";
      for ($n=0; $n<sizeof($colArr); $n++) {
        if ($n != 0) {
          $retStr .= ",";
        }
        $retStr .= " " . WA_DBS_cleanUpColumnName($colArr[$n]) . " " . WADA_getSortAscendingDescending($srtArr[$n]);
      }
      if (!preg_match("/\bORDER\s*BY\b/i", $tSrc)) {
        $retStr = " ORDER BY" . $retStr;
      }
      else {
        $retStr = "," . $retStr;
      }
    }
    else {
      $retStr = $this->DefaultSort;
      if ($retStr != "" && preg_match("/\bORDER\s*BY\b/i", $tSrc) && preg_match("/\bORDER\s*BY\b/i", $retStr)) {
        $retStr = preg_replace("/\bORDER\s*BY\b/i", ", ", $retStr);
      }
    }
    $this->FinalOrderClause = $retStr;
    return $retStr;
  }
  
}

function WADA_getSortAscendingDescending($testStr) {
  if (strtoupper(substr($testStr, 0, 1)) == "A") {
    return "ASC";
  }
  return "DESC";
}

//finds the proper position to insert the query statements
function findSourceInsertIndex($source)     {
  $returnIndex = 0;
  $indexOfLastFrom = (preg_match("/\s{1,}(FROM)\s{1,}/i",$source, $matches)>0) ? strpos($source,$matches[0]) : false;
  $sourceAfterLastFrom = substr($source, $indexOfLastFrom);
  $indexOfNextFrom = (preg_match("/\s{1,}(FROM)\s{1,}/i",$sourceAfterLastFrom, $matches)>0) ? strpos($sourceAfterLastFrom,$matches[0]) : false;
  while ($indexOfNextFrom > 0)  {
    $indexOfLastFrom+=$indexOfNextFrom+1;
	$sourceAfterLastFrom = substr($sourceAfterLastFrom, $indexOfNextFrom)+1;
	$indexOfNextFrom = (preg_match("/\s{1,}(FROM)\s{1,}/i",$sourceAfterLastFrom, $matches)>0) ? strpos($sourceAfterLastFrom,$matches[0]) : false;
  }
  
  $indexOfLastON = (preg_match("/\s{1,}(ON)\s{1,}/i",$sourceAfterLastFrom, $matches)>0) ? strpos($sourceAfterLastFrom,$matches[0]) : false;
  while ($indexOfLastON !== false)  {
    $indexOfLastFrom+=$indexOfLastON+1;
    $sourceAfterLastFrom = substr($sourceAfterLastFrom, $indexOfLastON+1);
    $indexOfLastON = (preg_match("/\s{1,}(ON)\s{1,}/i",$sourceAfterLastFrom, $matches)>0) ? strpos($sourceAfterLastFrom,$matches[0]) : false;
  }


  $indexOfOrderBy = (preg_match("/\s{1,}(ORDER BY)\s{1,}/i",$sourceAfterLastFrom, $matches)>0) ? strpos($sourceAfterLastFrom,$matches[0]) : false;
  $indexOfGroupBy = (preg_match("/\s{1,}(GROUP BY)\s{1,}/i",$sourceAfterLastFrom, $matches)>0) ? strpos($sourceAfterLastFrom,$matches[0]) : false;

  if ($indexOfOrderBy > 0)
    $returnIndex = $indexOfLastFrom+$indexOfOrderBy;
  if ($indexOfGroupBy > 0)
    $returnIndex = $indexOfLastFrom+$indexOfGroupBy;
  if ($returnIndex == 0){
		$returnIndex = (preg_match("/(;\s*)$/",$source, $matches)>0) ? strpos($source,$matches[0]) : strlen($source);
  }
  return Array($returnIndex,(strpos(strtoupper($sourceAfterLastFrom), "WHERE") || strpos(strtoupper($sourceAfterLastFrom), "WHERE")===0));
}

function WA_DBS_cleanUpColumnName($colName) {
	if (strpos($colName, ";") !== false) {
		$colName = substr($colName, 0, strpos($colName, ";"));
	}
	if (strpos($colName, "(") !== false) {
		$colName = substr($colName, 0, strpos($colName, "("));
	}
	if (strpos($colName, "=") !== false) {
		$colName = substr($colName, 0, strpos($colName, "="));
	}
	return $colName;
}

function WA_DBS_cleanUpEquality($tEquality) {
	if ($tEquality != "=") {
		return WA_DBS_cleanUpColumnName($tEquality);
	}
	return $tEquality;
}

function WA_DBS_clearOutSQLKeywords($tString) {
	if (strpos(strtolower($tString), "select") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "drop") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "alter") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "create") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "update") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "insert") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "delete") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "'") !== false) {
		return "";
	}
	if (strpos(strtolower($tString), "#") !== false) {
		return "";
	}
	return $tString;
}

function WA_DBS_PostOrGetField($fieldName) {
	if (isset($_POST[$fieldName]) && $_POST[$fieldName] != "") {
		return $_POST[$fieldName];
	}
	if (isset($_GET[$fieldName]) && $_GET[$fieldName] != "") {
		return $_GET[$fieldName];
	}
	return "";
}
?>