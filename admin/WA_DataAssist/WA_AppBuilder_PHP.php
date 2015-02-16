<?php
/*-----------------------------------------------------------------------------
-	This file contains proprietary and confidential information from WebAssist.com
-	corporation.  Any unauthorized reuse, reproduction, or modification without
-	the prior written consent of WebAssist.com is strictly prohibited.
-
-	Copyright 2005-2007 WebAssist.com Corporation.  All rights reserved.
------------------------------------------------------------------------------*/

// Application Builder functions
function WA_AB_getLoopedFieldName($tName, $loopInde) {
  if (!strlen($tName)) {
    return $tName;
  }
  if (strlen($tName) == 1 || substr($tName, strlen($tName)-1) != "_") {
    $tName = $tName . "_";
  }
  return $tName . $loopInde;
}

function WA_AB_getLoopedFieldValue($loopedFieldName, $counterVal) {
  $loopedFieldName = WA_AB_getLoopedFieldName($loopedFieldName, $counterVal);
  if ($loopedFieldName != "" && (isset($_POST[$loopedFieldName]) || isset($_GET[$loopedFieldName]))) {
    if (isset($_POST[$loopedFieldName])) {
      return $_POST[$loopedFieldName];
    }
    return $_GET[$loopedFieldName];
  }
  return "";
}

function WA_AB_checkLoopedFieldsExist($loopedFields, $counterVal) {
  for ($n=0; $n<sizeof($loopedFields); $n++) {
    $loopedFieldName = WA_AB_getLoopedFieldName($loopedFields[$n], $counterVal);
    if ($loopedFieldName != "" && (isset($_POST[$loopedFieldName]) || isset($_GET[$loopedFieldName]))) {
      return true;
    }
  }
  return false;
}

function WA_AB_checkLoopedFieldsNotBlank($loopedFields, $counterVal) {
  if (!WA_AB_checkLoopedFieldsExist($loopedFields, $counterVal)) {
    return false;
  }
  for ($n=0; $n<sizeof($loopedFields); $n++) {
    if (WA_AB_getLoopedFieldValue($loopedFields[$n], $counterVal) != "") {
      return true;
    }
  }
  return false;
}

function WA_AB_returnPreSelectValue($PreSelectArray, $optionValue) {
  for ($n=0; $n<sizeof($PreSelectArray); $n++) {
    if ($PreSelectArray[$n] == $optionValue) {
      return $optionValue;
    }
  }
  return $optionValue . "DONOTSELECT";
}

function WA_AB_doManageRelationalTable($WA_valuesList, $WA_appliedString, $WA_appliedList, $WA_connection, $WA_table, $WA_masterKeyField, $WA_masterKeyType, $WA_masterKeyValue, $WA_masterKeyComp, $WA_joinedKeyField, $WA_joinedKeyType, $WA_joinedKeyComp, $WA_fieldNamesStr, $WA_columnTypesStr) {
  $WA_fieldNames = explode("|", $WA_fieldNamesStr);
  $WA_columns = explode("|", $WA_columnTypesStr);
  $WA_formerString = "";
  $WA_formerList = array();
  $WA_insertIDs = "";
  $WhereObj = WA_AB_generateWhereClause(array($WA_masterKeyField), array($WA_masterKeyType), array($WA_masterKeyValue), array($WA_masterKeyComp));
  $WA_Sql = "SELECT ".$WA_masterKeyField.", ".$WA_joinedKeyField." FROM ".$WA_table." WHERE ".$WhereObj->sqlWhereClause." ORDER BY ".$WA_joinedKeyField;
  $WA_mrtJoinRS = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
  if (mysql_num_rows($WA_mrtJoinRS) > 0) {
    while ($row_WA_mrtJoinRS = mysql_fetch_assoc($WA_mrtJoinRS)) {
      $WA_formerString .= "^" . $row_WA_mrtJoinRS[$WA_joinedKeyField] . "^";
      $WA_formerList[] = $row_WA_mrtJoinRS[$WA_joinedKeyField];
    }
  }
  for ($n=0; $n<sizeof($WA_formerList); $n++) {
    if (strpos($WA_appliedString, "^" . $WA_formerList[$n] . "^") === false) {
      $deleteParamsObj = WA_AB_generateWhereClause(array($WA_masterKeyField, $WA_joinedKeyField), array($WA_masterKeyType, $WA_joinedKeyType), array($WA_masterKeyValue, $WA_formerList[$n]), array($WA_masterKeyComp, $WA_joinedKeyComp));
      $WA_Sql = "DELETE FROM `" . $WA_table . "` WHERE " . $deleteParamsObj->sqlWhereClause;
      $MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
    }
  }
  for ($n=0; $n<sizeof($WA_appliedList); $n++) {
    if (strpos($WA_formerString, "^" . $WA_appliedList[$n] . "^") === false) {
      $WA_insertIDs .= "^" . $WA_appliedList[$n] . "^";
    }
  }
  for ($n=0; $n<sizeof($WA_valuesList); $n++) {
    $WA_fieldValues = explode("|", str_replace("^MASTERID^", $WA_masterKeyValue, str_replace("^JOINID^", $WA_valuesList[$n][0], $WA_valuesList[$n][1])));
    if (strpos($WA_insertIDs, "^" . $WA_valuesList[$n][0] . "^") === false) {
      if (str_replace("^MASTERID^", "", str_replace("^JOINID^", "", $WA_valuesList[$n][1])) != "|") {
        $updateParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
        $WhereObj = WA_AB_generateWhereClause(array($WA_masterKeyField, $WA_joinedKeyField), array($WA_masterKeyType, $WA_joinedKeyType), array($WA_masterKeyValue, $WA_valuesList[$n][0]), array($WA_masterKeyComp, $WA_joinedKeyComp));
        $WA_Sql = "UPDATE `" . $WA_table . "` SET " . $updateParamsObj->WA_setValues . " WHERE " . $WhereObj->sqlWhereClause . "";
        $MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
      }
    }
    else {
      $insertParamsObj = WA_AB_generateInsertParams($WA_fieldNames, $WA_columns, $WA_fieldValues, -1);
      $WA_Sql = "INSERT INTO `" . $WA_table . "` (" . $insertParamsObj->WA_tableValues . ") VALUES (" . $insertParamsObj->WA_dbValues . ")";
      $MM_editCmd = mysql_query($WA_Sql, $WA_connection) or die(mysql_error());
    }
  }
}

class WA_AB_InsertParams {
  var $WA_tableValues;
  var $WA_dbValues;
  var $WA_setValues;
  function WA_AB_InsertParams($WA_tableValues = "", $WA_dbValues = "", $WA_setValues = "")     {
    $this->WA_tableValues = $WA_tableValues;
    $this->WA_dbValues = $WA_dbValues;
    $this->WA_setValues = $WA_setValues;
  }
}
function WA_AB_generateInsertParams($fieldNameList, $columnTypeList, $fieldValueList, $ignoreIndex)     {
  $obj = new WA_AB_InsertParams();
  for ($i=0; $i < sizeof($fieldNameList); $i++)     {
    if ($i !== $ignoreIndex)  {
      $formVal = $fieldValueList[$i];
      $WA_typesArray = explode(",", $columnTypeList[$i]);
      $delim =    ($WA_typesArray[0] != "none") ? $WA_typesArray[0] : "";
      $altVal =   ($WA_typesArray[1] != "none") ? $WA_typesArray[1] : "";
      $emptyVal = ($WA_typesArray[2] != "none") ? $WA_typesArray[2] : "";
  	  if ($formVal == "" || $formVal == "undefined")     {
        $formVal = $emptyVal;
      } else     {
        if ($altVal != "")     {
          $formVal = $altVal;
        } else if ($delim == "'")     { // escape quotes
		  $formVal = "'".((!(preg_match("/(^|[^\\\\])'/", $formVal))) ? $formVal : addslashes($formVal))."'";
        } else if ($delim == "") {
	   	//numeric
		  if (is_numeric($formVal)) {
			$formVal = "".floatval($formVal);
		  }
		  else {
			$formVal = "0";
		  }
	    }
	    else    {
          $formVal = $delim.WA_AB_clearOutSQLKeywords($formVal).$delim;
        }
      }
      $obj->WA_tableValues .= (($obj->WA_tableValues != "") ? "," : "") . "`" .  WA_AB_cleanUpColumnName($fieldNameList[$i]) . "`";
      $obj->WA_dbValues .= (($obj->WA_dbValues != "") ? "," : "") . $formVal;
      $obj->WA_setValues .= (($obj->WA_setValues != "") ? ", " : "") . "`" . WA_AB_cleanUpColumnName($fieldNameList[$i]) ."`" . " = " . $formVal;
    }
  }
  return $obj;
}

class WA_AB_WhereClause {
  var $sqlWhereClause;
  function WA_AB_WhereClause($sqlWhereClause = "") {
    $this->WA_AB_WhereClause = $sqlWhereClause;
  }
}
function WA_AB_generateWhereClause($fieldNameList, $columnTypeList, $fieldValueList, $comparisonList)
{
  $obj = new WA_AB_WhereClause();
  for ($i = 0; $i < sizeof($fieldNameList); $i++)     {
      $formVal = $fieldValueList[$i];
      $WA_typesArray = explode(",", $columnTypeList[$i]);
      $delim =    ($WA_typesArray[0] != "none") ? $WA_typesArray[0] : "";
      $altVal =   ($WA_typesArray[1] != "none") ? $WA_typesArray[1] : "";
      $emptyVal = ($WA_typesArray[2] != "none") ? $WA_typesArray[2] : "";
      if ($formVal == "" || $formVal == "undefined") {
        $formVal = $emptyVal; 
      } else     {
        if ($altVal != "")     {
          $formVal = $altVal;
        } else if ($delim == "'")     { // escape quotes
		  $formVal = "'".((!(preg_match("/(^|[^\\\\])'/", $formVal))) ? $formVal : addslashes($formVal));
          if ($comparisonList[$i] == " LIKE ") $formVal .= "%";;
          $formVal .= "'";
        } else if ($delim == "") {
	   	//numeric
		  if (is_numeric($formVal)) {
			$formVal = "".floatval($formVal);
		  }
		  else {
			$formVal = "0";
		  }
	    } else     {
          $formVal = $delim.WA_AB_clearOutSQLKeywords($formVal).$delim;
        }
      }
	  if (!($delim == "" && strpos($formVal,"()")>0))  {
        if ($formVal == "NULL")  {
          $obj->sqlWhereClause .= (($i != 0) ? " AND " : "")."`". WA_AB_cleanUpColumnName($fieldNameList[$i])."`"." IS ".$formVal;
        }
        else  {
          $obj->sqlWhereClause .= (($i != 0) ? " AND " : "")."`". WA_AB_cleanUpColumnName($fieldNameList[$i])."`".WA_AB_cleanUpEquality($comparisonList[$i]).$formVal;
        }
      }
  }
  return $obj;
}

function WA_AB_cleanUpColumnName($colName) {
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

function WA_AB_cleanUpEquality($tEquality) {
	if (preg_replace('/^\\s*|\\s*$/', "", $tEquality) != "=") {
		return WA_AB_cleanUpColumnName($tEquality);
	}
	return $tEquality;
}

function WA_AB_clearOutSQLKeywords($tString) {
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
?>
