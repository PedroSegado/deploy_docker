<?php

// Make this require relative to the parent of the current folder
// http://stackoverflow.com/exercises/24753758


require_once dirname(__DIR__) . "/config.php";
require 'vendor/autoload.php';

$CFG->codetestRootDir = dirname(__FILE__);
$CFG->codetestBasePath = __DIR__;


$CFG->twig = array(
    'viewsPath' => __DIR__ . "/views",
    'debug' => true,
    'cachePath' => __DIR__ . "/tmp",
);

$CFG->CT_log = array(
    'debug' => true,
    'filePath' => __DIR__ . "/tmp/ctLog.log",
);

$CFG->repositoryUrl = getenv('SPRING_CODETEST_URL').":".getenv('SPRING_CODETEST_PORT');

$CFG->type = [
    "PHP" => "PHP",
    "MYSQL" => "MYSQL",
    "Python" => "Python",
    "Java" => "Java"
];

$CFG->apiConfigs = [
    "spring-repo" => [
        // MUST HAVE A TRAILING SLASH
        "baseUrl" => "http://{$CFG->repositoryUrl}/",
        "user" => getenv('CENTRAL_REPOSITORY_USER'),
        "pass" => getenv('CENTRAL_REPOSITORY_PASS'),
    ],
    "authorkit" => [
        // MUST HAVE A TRAILING SLASH
        "baseUrl" => getenv('AK_BASE_URL'),
        "user" => getenv('AK_USER'),
        "pass" => getenv('AK_PASS'),
    ],
    "xml-validator" => [
        // MUST HAVE A TRAILING SLASH
        "baseUrl" => "http://".getenv('XML_EVALUATOR_URL').":".getenv('XML_EVALUATOR_PORT')."/",
    ],
];

$CFG->programmingLanguajes = array(
    'PHP',
    'Java',
    'Javascript',
    'Python'
);

$CFG->CT_Types = array(
    'formsPath' => 'exercise/forms/',
    'studentsPath' => 'exercise/students/',
    'types' => array(
        'MYSQL' => array(
            'name' => 'sql',
            'class' => \CT\CT_ExerciseSQL::class,
            'instructorForm' => 'exerciseSQLForm.php.twig',
            'studentView' => 'exerciseSQLStudent.php.twig',
            'sqlTypes' => array('SELECT', 'DML', 'DDL'),
            'dbConnections' => array(
                array(
                    'name' => 'MySQL',
                    'dbDriver' => 'mysql',
                    'dbHostName' => 'tsugi-mysql-db',
                    'dbPort' => 3306,
                    'dbUser' => 'tsugi_root',
                    'dbPassword' => 'tpass',
                    'onFly' => array(
                        'allowed' => true,
                        'userPrefix' => 'JUEZ',
                        'createIsolateUserProcedure' => 'tsugi.CREATEISOLATEUSER',
                        'dropIsolateUserProcedure' => 'tsugi.DROPISOLATEUSER',
                    ),
                ),
                array(
                    'name' => 'Oracle',
                    'dbDriver' => 'oci',
                    'dbHostName' => 'localhost',
                    'dbPort' => 1521,
                    'dbSID' => 'dbSID',
                    'dbUser' => 'oraUser',
                    'dbPassword' => 'oraPass',
                    'onFly' => array(
                        'allowed' => true,
                        'userPrefix' => 'userPrefix',
                        'createIsolateUserProcedure' => 'CREATEISOLATEUSER', // Show definition at the end
                        'dropIsolateUserProcedure' => 'DROPISOLATEUSER', // Show definition at the end
                    ),
                ),
                array(
                    'name' => 'SQLite',
                    'dbDriver' => 'sqlite',
                    'dbFile' => '/path/to/file.sq3 or :memory:',
                    'dbUser' => '',
                    'dbPassword' => '',
                    'onFly' => array(
                        'allowed' => true,
                    ),
                ),
            ),
        ),
        'programming' => array(
            'name' => 'programming',
            'class' => \CT\CT_ExerciseCode::class,
            'instructorForm' => 'exerciseCodeForm.php.twig',
            'studentView' => 'exerciseCodeStudent.php.twig',
            'timeout' => 5,
            'codeLanguages' => array(
                array('name' => 'XPath', 'ext' => 'xml', 'command' => null, 'stdin' => false),
            ),
        ),
    ),
);

$CFG->difficulty = array(
    "Easy" => "Easy",
    "medium" => "Medium",
    "Hard" => "Hard"
);
