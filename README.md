EmailMarketing
==============

PHP/MySQL app for email marketing.

Server Requirements

PHP version 4.0+

Installation

1. admin/admin/config.php must be updated
2. app/assets/ck-editor/plugins/imgupload.php must be updated with correct upload dir for template editor
images
3. templates need to be added in send.php and template.php. Also, 3 files of the template need to be added. The
.php extension is the first file shown before it has been edited. The .html extension is the file shown after it
has been edited and the -mini.html will be the actual sent file. Late it will also need to be added at the begining 
when user signs up for account in initial account setup.
4. save-lists.php redirect_uri needs to be updated.