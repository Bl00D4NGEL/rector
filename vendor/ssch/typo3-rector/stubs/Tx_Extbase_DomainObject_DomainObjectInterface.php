<?php

namespace RectorPrefix20211107;

if (\interface_exists('Tx_Extbase_DomainObject_DomainObjectInterface')) {
    return;
}
interface Tx_Extbase_DomainObject_DomainObjectInterface
{
}
\class_alias('Tx_Extbase_DomainObject_DomainObjectInterface', 'Tx_Extbase_DomainObject_DomainObjectInterface', \false);