<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '123.207.58.12', // 服务器地址
    'DB_NAME'               =>  'jyzd',      // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',      // 密码
    'DB_PORT'               =>  '3306',      // 端口
    'DB_PREFIX'             =>  'vs_',       // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DEFAULT_CONTROLLER'    =>  'Home', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'URL_MODEL'             =>  3,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'URL_PARAMS_BIND_TYPE'  =>  1, // URL变量绑定的类型 0 按变量名绑定 1 按变量顺序绑定

    
    'TOKEN_ON'      =>    true,  // 是否开启令牌验证 默认关闭
    'TOKEN_NAME'    =>    '__hash__',    // 令牌验证的表单隐藏字段名称，默认为__hash__
    'TOKEN_TYPE'    =>    'md5',  //令牌哈希验证规则 默认为MD5
    'TOKEN_RESET'   =>    true  //令牌验证出错后是否重置令牌 默认为true
);