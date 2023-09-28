# Revenue_Collection_System

INSTALLATION GUIDE

> git clone git@github.com:Jimna254/Revenue_Collection_System.git

> cd Revenue_Collection_System

> composer install

> cp .env.example .env

> Set up .env file

> php artisan key:generate

> php artisan storage:link

> php artisan migrate:fresh --seed

> php artisan serve

> http://127.0.0.1:8000/


FTP PASSWORD = 32UOe9{Hk__V

FTP USERNAME = app@app.kariukijames.com

FTP HOST = ftp.kariukijames.com


```bash
name: Deploy to cPanel
on:
  push:
    branches:
      - main
jobs:
  FTP-Deploy-Action:
    name: FTP-Deploy-Action
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2.1.0
        with:
          fetch-depth: 2
      # Deploy to cPanel
      - name: FTP-Deploy-Action
        uses: SamKirkland/FTP-Deploy-Action@3.1.1
        with:
          ftp-server: ${{ secrets.FTP_SERVER }}
          ftp-username: ${{ secrets.FTP_USERNAME }}
          ftp-password: ${{ secrets.FTP_PASSWORD }}
```

Fix


```bash
name: Deploy to cPanel
on:
  push:
    branches:
      - main
jobs:

  FTP-Deploy-Action:
    name: FTP-Deploy-Action
    runs-on: ubuntu-latest
    steps:
      - uses:

```