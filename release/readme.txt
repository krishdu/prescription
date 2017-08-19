Follow http://getbootstrap.com/docs/3.3/css/ for bootstrap CSS

$hostname = "localhost";
$username = "myepresc_pres";
$passwordsc = "KTHUsQI(xaCy";
$dbName = "myepresc_prescription";

CREATE USER 'myepresc_pres'@'localhost' IDENTIFIED BY  '***';

GRANT USAGE ON * . * TO  'myepresc_pres'@'localhost' IDENTIFIED BY  '***' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

GRANT ALL PRIVILEGES ON  `myepresc_prescription` . * TO  'myepresc_pres'@'localhost';

Click on WampServer Icon -> MySQL -> MySQL Consol
Enter your database password like root in popup
Select database name for insert data by writing command USE DATABASENAME
Then load source sql file as SOURCE C:\FOLDER\database.sql
Press enter for insert data.