utils
=====

* Charger un dump sql en ayant la progression du chargement : 
  ```sh
  pv -i 1 -p -t -e /path/to/sql/dump | mysql -u USERNAME -p DATABASE_NAME
  ```
