# -*- mode: ruby -*-
# vi: set ft=ruby :

DB_IP = "192.168.33.11"
DB_HOST = "moj-be-db"
DB_NAME = "d8_moj"
DB_USER = "d8_moj"
DB_PASS = "moj_password"

$initLaravel = <<SCRIPT
cd /var/www/laravel
composer update && composer install
SCRIPT


Vagrant.configure(2) do |config|
    #
    # replaced with Scochbox VM...
    # it just works
    # more info and spec here
    # https://box.scotch.io
    #
    config.vm.box = "scotch/box"
    config.vm.define :laravel do |laravel|
    laravel.vm.network "private_network", ip: "192.168.33.7"
    laravel.vm.synced_folder ".", "/var/www/laravel", owner: "www-data", group: "www-data"
    laravel.vm.provider "virtualbox" do |vb|
      vb.name = "Vagrant - moj-fe.dev"
      vb.memory = "1024"
      vb.customize [
        "modifyvm", :id,
        "--groups", "/MoJ",
      ]
    end
    laravel.vm.provision "shell", inline: $initLaravel
  end
end
