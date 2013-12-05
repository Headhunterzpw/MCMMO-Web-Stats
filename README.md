MCMMO-Web-Stats
===============

A simple Web interface to use with the MCMMO plugin, it's pretty easy to configure. Just make sure you use a MYSQL database to store
the MCMMO values.

MCMMO Web Stats requires MYSQLi extension =)

=============================================

Open up webstats.php to configure...

use_html -- if set to true, html, body and head tags will be inserted, perfect if you want to use it as is aka Standalone

page_title -- only needed if you set use_html to true

use_jquery -- only needed if you run it as standalone OR if embedded and the source don't use jquery

use_datatables -- set to true if you want to use jquery dataTables (jquery is required here or from the source if embedded)

use_datatables_css -- set to true if you want to use dataTables CSS file

use_themeroller -- set to true if you want to use jqueryUI Smoothness theme (needs jquery, jqueryUI and dataTables enabled)

use_custom -- set to true and place a custom.css file in root\css directory

use_bootstrap -- set to true if you want to enable bootstrap classes

use_bootstrap_css -- set to true if you want to use the included bootstrap.css file (IT'S JUST THE CSS FILE INCLUDED)

wrapper_size -- leave empty for 100% or set a value to use pixels, eg: 500 = 500px

datatables_lang -- use to implement dataTable language JS file, leave empty for english

=============================================

Below the configuration you can define all static language

Note* Visit jqueryUI's website to download other themes or use Firebug to define a custom.css file 

Note** this is just a first version, I will try to make it more easy to understand and implement more features