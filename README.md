# docker-simplesamlldap

Dockerized plug and play SAML 2.0 Identity Provider (IdP) configured for LDAP.

Built with [SimpleSAMLphp](https://simplesamlphp.org/). Based on [official PHP8 Apache image](https://hub.docker.com/_/php/).

## Usage

### Using docker run command

```sh
docker run --name=idp \
  -p 8080:8080 \
  -e SIMPLESAMLPHP_SP_ENTITY_ID=http://app.example.com \
  -e SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE=http://localhost/simplesaml/module.php/saml/sp/saml2-acs.php/test-sp \
  -e SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE=http://localhost/simplesaml/module.php/saml/sp/saml2-logout.php/test-sp \
  -d skapxdev/simplesamlphp
```

### Using docker-compose

```yml
version: "3"
services:
  idp:
    image: skapxdev/simplesamlphp
    container_name: idp
    ports:
      - "8080:8080"
    environment:
      SIMPLESAMLPHP_SP_ENTITY_ID: http://app.example.com
      SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE: http://localhost/simplesaml/module.php/saml/sp/saml2-acs.php/test-sp
      SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE: http://localhost/simplesaml/module.php/saml/sp/saml2-logout.php/test-sp
```
<br>

Admin Login

| Username |Password |
|----------|---|
| admin    |secret|

## Environment Variables

| Name                                          |Required/Optional|Description|
|-----------------------------------------------|---|---|
|  `SIMPLESAMLPHP_SP_ENTITY_ID`                 |Required|The entity ID of your SP.|
|`SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE` |Requried|The assertion consumer service of your SP.|
|`SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE`      |Optional|The single logout url of your SP.|
| `SIMPLESAMLPHP_IDP_ADMIN_PASSWORD`            |Optional|The password of admin of this IdP. Default is `secret`.|
| `SIMPLESAMLPHP_IDP_SECRET_SALT`               |Optional|This is a secret salt used by this IdP when it needs to generate a secure hash of a value. Default is `defaultsecretsalt`.|
|`SIMPLESAMLPHP_IDP_SESSION_DURATION_SECONDS`  |Optional|This value is the duration of the session of this IdP in seconds.|
| `SIMPLESAMLPHP_IDP_BASE_URL`                  |Optional|This value allows you to override the base URL. Valuable for setting an `https://` base url behind a reverse proxy. **If you set this variable, please end it with a trailing `/`** example: `https://my.proxy.com/` Default is `` (empty string).|
