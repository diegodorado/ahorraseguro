set :application, "ahorraseguro"
set :domain,      "#{application}.com.ar"
set :deploy_to,   "/var/www/#{domain}"
set :user,   "root"
set :port, 4198
ssh_options[:auth_methods] = ["publickey"]
ssh_options[:keys] = ["~/.ssh/common_rsa"]
set :use_sudo, false
set :deploy_via, :remote_cache

set :repository,  "git://github.com/diegodorado/#{application}.git"
set :scm, :git

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

set  :keep_releases,  3
