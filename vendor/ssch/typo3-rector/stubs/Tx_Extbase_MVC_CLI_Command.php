<?php

namespace RectorPrefix20211107;

if (\class_exists('Tx_Extbase_MVC_CLI_Command')) {
    return;
}
class Tx_Extbase_MVC_CLI_Command
{
}
\class_alias('Tx_Extbase_MVC_CLI_Command', 'Tx_Extbase_MVC_CLI_Command', \false);