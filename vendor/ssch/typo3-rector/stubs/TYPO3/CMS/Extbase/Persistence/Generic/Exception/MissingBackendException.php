<?php

namespace RectorPrefix20211107\TYPO3\CMS\Extbase\Persistence\Generic\Exception;

if (\class_exists('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Exception\\MissingBackendException')) {
    return;
}
class MissingBackendException
{
}