/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
// Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode' ] },//
		{ name: 'clipboard',   groups: [ 'undo' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent','blocks', '-', 'align'] },//, 'bidi'
		{ name: 'insert',   	groups: ['Image','Table', 'HorizontalRule', 'Smiley','SpecialChar'] },//, 'bidi'
		{ name: 'editing',     groups: [ 'find'] },//, 'Replace', 'SelectAll', 'Scayt'
		'/',
		{ name: 'tools' },//
		{ name: 'styles' },//
		{ name: 'colors'},
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },//, 'cleanup'//
		{ name: 'links' },
	];
	config.extraPlugins = 'sourcedialog';
	

	config.allowedContent = true;//
	config.fillEmptyBlocks = false;
	config.title = false;

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	//config.format_tags = 'p;h1;h2;h3;pre';
	
	CKEDITOR.on('dialogDefinition', function( ev ) {
  var dialogName = ev.data.name;
  var dialogDefinition = ev.data.definition;

  if(dialogName === 'table') {
    var infoTab = dialogDefinition.getContents('info');
    var cellSpacing = infoTab.get('txtCellSpace');
    cellSpacing['default'] = "0";
    var cellPadding = infoTab.get('txtCellPad');
    cellPadding['default'] = "0";
    var border = infoTab.get('txtBorder');
    border['default'] = "0";
  }
});

	 //Make dialogs simpler.
	//config.removeDialogTabs = 'image:advanced;link:advanced';
};
