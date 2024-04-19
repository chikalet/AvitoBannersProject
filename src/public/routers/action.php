<?php
$start = microtime(true);
function route($method, $urlList, $requestData)
{
    $link = mysqli_connect('mysql', 'root', 's123123', 'mysql');
    if ($method=='POST'){
        switch ($urlList[1]) {
            case 'action':
                $activate = $requestData->body->activate;
                if ($activate == 'activate') {
                    $action = $link->query("SELECT * FROM Banner_Tags WHERE Banner_name='баннер скидки по кухонным изделиям'")->fetch_assoc();
                    if ($action['id'] != 0) {
                        echo "таблицы созданы. Метод не может быть исполнен";
                        break;
                    } else {
                    $action = $link->query("CREATE TABLE users (id int auto_increment primary key, name varchar(50), login varchar(50), password varchar(150))");
                    $action = $link->query("CREATE TABLE tokens (
                                                 value varchar(255) not null primary key,
                                                 userID int(50),
                                                 validUntil timestamp DEFAULT NULL,
                                                 FOREIGN KEY (userID)  REFERENCES users (id),
                                                 role varchar(5) DEFAULT 'user',
                                                 tag varchar(6) DEFAULT '1')");
                    $action = $link->query("CREATE TABLE Tags (
                                                 Tag_ID INT PRIMARY KEY auto_increment,
                                                 name_group varchar(255))");
                    $action = $link->query("CREATE TABLE Features (
                                                 Feature_ID INT PRIMARY KEY auto_increment,
                                                 name_features varchar(255))");
                    $action = $link->query("CREATE TABLE Banners (
                                                 Banner_ID INT PRIMARY KEY auto_increment,
                                                 Feature_ID INT,
                                                 active int default 1,
                                                 name_banner varchar(255),
                                                 FOREIGN KEY (Feature_ID) REFERENCES Features(Feature_ID))");
                    $action = $link->query("CREATE TABLE Banner_Tags (
                                                 id int auto_increment,
                                                 Banner_ID int,
                                                 Banner_name varchar(100),
                                                 Tag_ID INT,
                                                 PRIMARY KEY (id),
                                                 FOREIGN KEY (Banner_ID) REFERENCES Banners(Banner_ID),
                                                 FOREIGN KEY (Tag_ID) REFERENCES Tags(Tag_ID))");
                    $action = $link->query("insert into users (name, login, password) value ('adminname', 'adminlogin', '22052003')");
                    $action = $link->query("insert into users (name, login, password) value ('alex', 'alexlogin', 'datealex')");
                    $action = $link->query("insert into users (name, login, password) value ('petr', 'petrlogin', 'datepetr')");
                    $action = $link->query("insert into users (name, login, password) value ('ivan', 'ivanlogin', 'dateivan')");
                    $action = $link->query("insert into users (name, login, password) value ('leoinid', 'leonidlogin', 'dateleonid')");
                    $action = $link->query("insert into users (name, login, password) value ('samsa', 'samsalogin', 'datesamsa')");
                    $action = $link->query("insert into users (name, login, password) value ('cheburek', 'chebureklogin', 'datecheburek')");
                    $action = $link->query("insert into Features (name_features) value ('скидка на товары для новичков')");
                    $action = $link->query("insert into Features (name_features) value ('скидка на товары для детей')");
                    $action = $link->query("insert into Features (name_features) value ('повышение цены для постоянных пользователей')");
                    $action = $link->query("insert into Features (name_features) value ('повышение цены для любителей кухонных изделий')");
                    $action = $link->query("insert into Features (name_features) value ('повышение цены для любителей автомобилей')");
                    $action = $link->query("insert into Tags (name_group) value ('новичок')");
                    $action = $link->query("insert into Tags (name_group) value ('опытный пользователь')");
                    $action = $link->query("insert into Tags (name_group) value ('любитель автомобилей')");
                    $action = $link->query("insert into Tags (name_group) value ('любитель кухонных изделий')");
                    $action = $link->query("insert into Tags (name_group) value ('любитель кухонных курсов')");
                    $action = $link->query("insert into tokens (value, userID, role, tag) value ('ea09b711300927150303db0a791d5b9f', '1', 'admin', '2')");
                    $action = $link->query("insert into tokens (value, userID, role, tag) value ('e976c729f31de448b513bf3d6d620e43', '2', 'user', '1')");
                    $action = $link->query("insert into tokens (value, userID, role, tag) value ('db58c5abb733db4c13eeb66428cd6445', '3', 'user', '3')");
                    $action = $link->query("insert into tokens (value, userID, role, tag) value ('4ddbeb92e185045fa2cc6035f9dcbe5d', '4', 'user', '4')");
                    $action = $link->query("insert into tokens (value, userID, role, tag) value ('adminname', 'adminlogin', '22052003')");
                    $action = $link->query("insert into `Banners` (`Feature_ID`, `active`, `name_banner`) value ('1', '1', 'баннер предложения по товарам для новых зарегестрировавшихся пользователей')");
                    $action = $link->query("insert into Banners (Feature_ID, active, name_banner) value ('4', '1', 'баннер скидки по кухонным изделиям')");
                    $action = $link->query("insert into Banners (Feature_ID, active, name_banner) value ('5', '1', 'баннер предложения по автозапчастям')");
                    $action = $link->query("insert into Banners (Feature_ID, active, name_banner) value ('1', '1', 'баннер подтверждения почты для полной регистрации')");
                    $action = $link->query("insert into Banners (Feature_ID, active, name_banner) value ('2', '1', 'баннер предлогающей купить 2 робота по цене 1')");
                    $action = $link->query("insert into Banner_Tags (Banner_ID, Banner_name, Tag_ID) value ('1', 'баннер предложения по товарам для новых зарегестрировавшихся пользователей', '1')");
                    $action = $link->query("insert into Banner_Tags (Banner_ID, Banner_name, Tag_ID) value ('2', 'баннер скидки по кухонным изделиям', '4')");
                    $action = $link->query("insert into Banner_Tags (Banner_ID, Banner_name, Tag_ID) value ('2', 'баннер скидки по кухонным изделиям', '5')");
                    $action = $link->query("insert into Banner_Tags (Banner_ID, Banner_name, Tag_ID) value ('3', 'баннер предложения по автозапчастям', '3')");
                    $action = $link->query("insert into Banner_Tags (Banner_ID, Banner_name, Tag_ID) value ('4', 'баннер подтверждения почты для полной регистрации', '1')");
                    $action = $link->query("insert into Banner_Tags (Banner_ID, Banner_name, Tag_ID) value ('5', 'баннер предлогающей купить 2 робота по цене 1', '1')");
                    echo "КОМАНДА ВЫПОЛНЕНА. МОЖЕТЕ НАЧИНАТЬ РАБОТУ!";
                    break;
                }
                } else {
                    var_dump(http_response_code(400));
                    echo "НЕВЕРНАЯ КОМАНДА!";
                    break;
                }
        }
    }
}
