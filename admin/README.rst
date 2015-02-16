###################
Introduction
###################

This is a basic template for setting up PayPal Instant Payment Notification (IPN) using PHP.

This is NOT an object-oriented class library.  This is a rudimentary, but fully functional and time-saving solution to get up and running quickly with IPN.

*******************
Server Requirements
*******************

-  PHP version 4.0+

************
Installation
************

1) Extract contents of zip file and upload to a directory on your web server (eg. /paypal/ipn/)
2) Open /admin/config.php and follow the commented instructions to fill in necessary values.
3) Load /ipn/admin/install/ in a web browser and click the link to install the solution.
4) Login to your PayPal account, click into the profile, and find Instant Payment Notification settings.  
   Enable IPN and set the URL to http://www.yourdomain.com/paypal/ipn/ipn-listener.php (assuming you followed that directory structure)
5) Load /ipn/admin/ in a web browser to access the basic control panel included with the template solution.

You may `contact me directly <http://www.angelleye.com/contact-us/>`_ if you need additional help getting started.