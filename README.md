# Prescription Management System (Using GCP)

# Create Compute Engine in GCP
Create compute engine and then SSH into the VM. Issue the following command -

1. Go to your console git clone https://github.com/biswarup81/prescription.git
2. For update go to cd prescription. then run either of the following
git clone url --branch remote_branch_name


Then use (in case you're changing something in your code and try to refresh the local filesystem)
git fetch
git merge

# Connecting MYSQL from GCP

Install mysql client in Host's machine.
sudo apt-get update
sudo apt-get install mysql-client

# MYSQLCommands
mysql --host=localhost --user=root --password
show databases;
CREATE DATABASE prescription;
run http://<HOST>/prescription/setup/testconnection.php

# Load initial data
use prescription
source /var/html/prescription/setup/prescription.sql

# Changing to mysqli
Find mysql_query, then replace with mysqli_query($conn
Find mysql_fetch_array, then replace with mysqli_fetch_array
Find mysql_num_rows, then replace with mysql_num_rows
Find mysql_error, then replace with mysqli_error
Find mysql_insert_id, then replace with mysqli_insert_id
Find mysql_fetch_object, then replace with mysql_fetch_object

Any mysql_fetch_object($result) or die(mysql_error()) to be replaced by mysqli_fetch_object($result)



