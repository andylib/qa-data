<?php

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

require_once __DIR__ . '/Andylib/QATest/Data/TestUtil.php';

\Andylib\QATest\Data\TestUtil::init();
\ANdylib\QATest\Data\TestUtil::chroot();
