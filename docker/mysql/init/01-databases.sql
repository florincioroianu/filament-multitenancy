#create databases
CREATE DATABASE IF NOT EXISTS `multi_tenancy`;
GRANT ALL PRIVILEGES ON multi_tenancy TO 'multi_tenancy' IDENTIFIED BY 'mysql';
