# Application configuration

## .ENV configuration 

Configuration is available in .env file in the main directory.

| Variable              | Description                              | Default           | Options                       |
|-----------------------|------------------------------------------|-------------------|-------------------------------|
| APP_ENV               | Type Environment                         | dev               | prod, dev, test               |
| APP_HOST              | Application host                         | ergonode.local    |                               |
| APP_SCHEMA            | Application schema                       | http              | http, https                   |
| APP_URL               | Type Environment                         | http://ergonode.local |                           |
| DATABASE_URL          | Database connection                      | pgsql://postgres:123@127.0.0.1:5432/ergonode |    |
| JWT_PRIVATE_KEY_PATH  | path to private JWT key file             | config/jwt/private.pem                       |    |
| JWT_PUBLIC_KEY_PATH   | path to public JWT key file              | config/jwt/public.pem                        |    |
| JWT_PASSPHRASE        | JSON Web Token Key password              | 1234                                         |    |
| JWT_TOKEN_TTL         | JSON Web Token lifetime in seconds       | 86400                                        |    |
| JWT_REFRESH_TOKEN_TTL | Refresh JSON Web Token lifetime in seconds | 604800                                        |    |
| CORS_ALLOW_ORIGIN     | Cors access address                      | ^http?://localhost:3000\|$                   |    |
| USE_ASYNC_BUS         | Use asynchronous mode                    | false                                        |    |
| MESSENGER_TRANSPORT_COMPLETENESS_DSN | Completeness messenger queue in rabbit | amqp://guest:guest@localhost:5672/%2f/completeness  | |
| MESSENGER_TRANSPORT_CORE_DSN    | Core messenger queue in rabbit    | amqp://guest:guest@localhost:5672/%2f/core     | |
| MESSENGER_TRANSPORT_EXPORT_DSN  | Export messenger queue in rabbit  | amqp://guest:guest@localhost:5672/%2f/exports  | |
| MESSENGER_TRANSPORT_IMPORT_DSN  | Import messenger queue in rabbit  | amqp://guest:guest@localhost:5672/%2f/imports  | |
| MESSENGER_TRANSPORT_NOTIFICATION_DSN | Notification event messenger queue in rabbit | amqp://guest:guest@localhost:5672/%2f/notification  | |
| MESSENGER_TRANSPORT_SEGMENT_DSN | Segment messenger queue in rabbit | amqp://guest:guest@localhost:5672/%2f/segment  | |
| MAILER_DSN            | Mailing server address                   | null://null                                  |    |
| MAILER_SENDER         | Sender of the e-mail                     | dev@ergonode.com                             |    |
