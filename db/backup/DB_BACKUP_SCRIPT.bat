@echo off
set mysqldump_path="http:\\mis.liveblog365.com\mysql\bin\mysqldump"

set db_user=ezyro_37408132
set db_password=6db886e9b60
set db_name=ezyro_37408132_mra


set DATE=%DATE:/=-%
set TIME=%TIME::=-%
set BACKUP_DIR=D:\xampp\htdocs\mra2\db\backup
set FILENAME=MRA_DB_BACKUP.sql

%mysqldump_path% -u %db_user% -p%db_password% %db_name% > "%BACKUP_DIR%\%FILENAME%"

if errorlevel 1 (
  echo Failed to create database backup!
) else (
  echo Database backup created successfully.
)