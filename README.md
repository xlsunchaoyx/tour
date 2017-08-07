# tour
旅行社地接系统

1.通过composer安装依赖
`composer install`

2.复制配置文件
`cp .env.example .env`

3.生成APP_KEY
`php artisan key:generate`

4.配置.env文件，创建tour数据库
`php artisan migrate`

5.注册、登录。