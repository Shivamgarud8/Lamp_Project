# Lamp_Project base on Amazon Linux
📁 LAMP Stack Project on Amazon Linux – lamp_project
A fully functional LAMP (Linux, Apache, MySQL, PHP) stack project deployed on Amazon Linux 2023 EC2 instance. This web app is hosted on Apache, connected to a MySQL database, and supports user data input through a PHP form.

📌 Project Features:
✅ Deployed on Amazon Linux 2023 EC2

✅ Apache as the web server

✅ PHP-powered frontend

✅ MySQL database integration

✅ Form for user input stored in DB

✅ Proper Apache permissions and firewall setup

✅ Production-ready folder structure

✅ Manual + automated provisioning scripts

⚙️ Technology Stack
Layer	Technology
OS	Amazon Linux 2023
Web Server	Apache HTTP Server
Backend	PHP 8.x
Database	MySQL / MariaDB
Cloud	AWS EC2 (t2.micro)
Directory	/var/www/html/lamp_project


🧱 Folder Structure
lamp_project/
├── index.php
├── form.php
├── db_config.php
├── style.css
└── README.md



🚀 Run & Test
Open your EC2 Public IPv4 in browser:
http://<your-ec2-ip>/lamp_project

Fill the form and check MySQL database for entries.


#LAMP #AWS #AmazonLinux #DevOps #Apache #MySQL #PHP #Automation 


✅ Permissions & SELinux (if needed)
sudo chown -R apache:apache /var/www/html/lamp_project
sudo chmod -R 755 /var/www/html/lamp_project

