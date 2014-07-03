# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  #---Puppet Lab's CentOS Boxes---
  #https://github.com/puppetlabs/puppet-vagrant-boxes

  #Vanilla
  config.vm.box = "centos-65-x64-virtualbox-nocm"
  config.vm.box_url = "http://puppet-vagrant-boxes.puppetlabs.com/centos-65-x64-virtualbox-nocm.box"

  #---Networking---
  
  config.vm.hostname = "ss.local.dev"

  # Port forward 80 to 8080
  config.vm.network :forwarded_port, guest: 80, host: 8080, auto_correct: true
  #config.vm.network :forwarded_port, guest: 443, host: 443, auto_correct: true
  config.vm.network :forwarded_port, guest: 3306, host: 3306, auto_correct: true

  #Choose between private or public if you want bridged network functionality
  #config.vm.network "public_network", ip: "192.168.33.33"
  config.vm.network "private_network", ip: "192.168.33.33"

  config.vm.provider :virtualbox do |v|
    #v.customize ["modifyvm", :id, "--name", "ssvagrant"]
    v.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    v.customize ["modifyvm", :id, "--memory", 1024]
    v.customize ["modifyvm", :id, "--cpus", 2]
    v.customize ["modifyvm", :id, "--ioapic", "on"]
  end

  # JJG-Ansible-Windows
  # Use rbconfig to determine if we're on a windows host or not.
  require 'rbconfig'
  is_windows = (RbConfig::CONFIG['host_os'] =~ /mswin|mingw|cygwin/)
  if is_windows
    # Provisioning configuration for shell script.
    config.vm.provision "shell" do |sh|
      sh.path = "provisioning/JJG-Ansible-Windows/windows.sh"
      sh.args = "provisioning/playbook.yml provisioning/inventory"
    end
  else
    # Provisioning configuration for Ansible (for Mac/Linux hosts).
    config.vm.provision "ansible" do |ansible|
      ansible.playbook = "provisioning/playbook.yml"
      ansible.inventory_path = "provisioning/inventory"
      ansible.sudo = true
    end
  end

  # start service on boot since ansible enable=yes doesn't work properly on cent os 6.5
  # at leat with httpd
  # https://github.com/ansible/ansible/issues/7715
  # https://github.com/ansible/ansible/issues/7757
  config.vm.provision :shell, :path => "start.sh", run: "always"

end
