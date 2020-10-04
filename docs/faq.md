## FAQ

```
Q: I have error 413 – Request Entity Too Large
A: You need increase in the nginx client_max_body_size and in php upload max size. 
```

```
Q: How to increase the nginx client_max_body_size and in php upload max size?
```

In the .env file please set `NGINX_HTTP_DIRECTIVES` to `client_max_body_size 250m;` or higher value
```
NGINX_HTTP_DIRECTIVES="client_max_body_size 250m;" 
```
Also you can set `PHP_INI_DIRECTIVES` to `upload_max_filesize=250M;\npost_max_size = 250M;`

```
Q: How to increase php memory limit?
```
In the .env file please set `PHP_INI_DIRECTIVES` to `memory_limit=1024M;` or higher value

```
PHP_INI_DIRECTIVES="memory_limit=1024M;" 
```

```
Q: What data are stored?
A: For now only database in data folder
```

```
Q: Where can i change PHP settings?
A: In the environment variable PHP_INI_DIRECTIVES each setting must be delimited by ;
```

```
Q: Where can i change nginx http settings?
A: In the environment variable NGINX_HTTP_DIRECTIVES each setting must be delimited by ;
```

```
Q: What if I have better idea?
A: No problem ! Just tell us about your idea and we will discuse it. Bring lot of beers!
```

```
Q: This is awesome, how can i thank you?
A: No problem. Just send me an email to team@ergonode.com and attach a beer
```

```
Q: This is bullshit, how can i thank you for this crap?
A: No problem. Just send me an email to team@ergonode.com and attach a beer
```
