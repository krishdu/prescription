# Prescription Management System (Using GCP)

1. Go to your console git clone https://github.com/biswarup81/prescription.git
2. For update go to cd prescription. then run either of the following
git clone url --branch remote_branch_name
git pull origin your_branch_name

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
soiurce /var/html/prescription/setup/prescription.sql


