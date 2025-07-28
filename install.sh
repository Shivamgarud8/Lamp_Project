sudo yum update -y
sudo yum upgrade -y

# Install Apache
sudo yum install httpd -y

# Install MariaDB (MySQL)
sudo yum install mariadb105-server -y

# Install PHP
sudo amazon-linux-extras enable php8.0
sudo yum clean metadata
sudo yum install php php-mysqlnd -y

# Start services
sudo systemctl start httpd
sudo systemctl enable httpd

sudo systemctl start mariadb
sudo systemctl enable mariadb

# (Optional) Secure MySQL
sudo mysql_secure_installation
