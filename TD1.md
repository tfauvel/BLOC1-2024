# différences entre les méthodes http GET et POST

## GET

Avec la méthode GET, les données à envoyer au serveur\
sont écrites directement dans l’URL.\
Dans la fenêtre de votre navigateur, cela ressemble à ceci :

> __www.example.com/register.php?firstname=peter&name=miller&age=55&gender=male__

Toutes les informations saisies par l’utilisateur\
(les paramètres dits URL) sont transmises\
aussi librement que l’URL elle-même.

## POST

La méthode POST écrit les paramètres URL dans la requête HTTP pour le serveur.\
Les paramètres ne sont donc pas visibles pour les utilisateurs et la portée\
des requêtes POST est illimitée.

## Comparaison méthodes GET et POST

| **Aspect**                                           | **GET**                                                                                         | **POST**                                                                                             |
|------------------------------------------------------|--------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------------------------------|
| **Visibilité**                                       | Visible pour l’utilisateur dans le champ d’adresse.                                              | Invisible pour l’utilisateur.                                                                        |
| **Cache et fichier log du serveur**                  | Les paramètres de l’URL sont stockés sans chiffrement.                                            | Les paramètres de l’URL ne sont pas enregistrés automatiquement.                                     |
| **Comportement lors de l’actualisation du navigateur / Bouton « précédent »** | Les paramètres de l’URL ne sont pas envoyés à nouveau.                                            | Le navigateur avertit que les données du formulaire doivent être renvoyées.                          |
| **Type de données**                                  | Caractères ASCII uniquement.                                                                     | Caractères ASCII mais également données binaires.                                                    |
| **Longueur des données**                             | Limitée - longueur maximale de l’URL à 2 048 caractères.                                          | Illimitée.                                                                                            |


## LE PROTOCOLE HTTP EST EXTENSIBLE

les en-têtes HTTP permettent d'étendre facilement le protocole et de mener des expérimentations avec celui-ci.\
De nouvelles fonctionnalités peuvent même être introduites par un simple accord entre le client et le serveur\
à propos de la sémantique des nouveaux en-têtes.

## LE PROTOCOLE HTTP UN PROTOCOLE SANS ETAT

il n'y a pas de lien entre deux requêtes qui sont effectuées successivement sur la même connexion.\
Cela devient très rapidement problématique lorsque les utilisateurs veulent interagir avec une page de façon cohérente,\
par exemple avec un panier d'achat sur un site de commerce en ligne. Bien que le cœur d'HTTP soit sans état,\
les cookies HTTP permettent l'utilisation de sessions avec des états. En utilisant l'extensibilité par les en-têtes,\
des cookies HTTP sont ajoutés aux flux et permettent la création d'une session sur chaque requête HTTP pour partager un même contexte, ou un même état.

## DECOMPOSITION D'UN URL

> https://www.monsite.com  

1) Le protocole et le sous domaine : https://www 
2) Le nom de domaine : monsite
3) L'extension du nom de domaine : .com

## Codes Status HTTP

| **Catégorie**                          | **Code** | **Nom**                           | **Description**                                                                 |
|----------------------------------------|----------|-----------------------------------|---------------------------------------------------------------------------------|
| **Réponses informatives (100 - 199)**  | **100**  | Continue                          | Le serveur a reçu la requête initiale, et le client peut continuer à envoyer sa demande. |
| **Réponses de succès (200 - 299)**     | **200**  | OK                                | La requête a réussi.                                                             |
| **Messages de redirection (300 - 399)**| **300**  | Moved Permanently                 | La ressource demandée a été déplacée de façon permanente à une nouvelle URL.     |
| **Erreurs du client (400 - 499)**      | **400**  | Bad Request                       | La requête est invalide ou mal formée.                                           |
| **Erreurs du serveur (500 - 599)**     | **500**  | Internal Server Error             | Le serveur a rencontré une condition inattendue qui l'empêche de répondre à la requête. |

## Négociation de contenu

En HTTP, la négociation de contenu est le mécanisme utilisé pour servir différentes représentations\
d'une ressource à partir du même URI pour aider l'agent utilisateur à indiquer la représentation la plus adaptée\
à l'utilisatrice ou à l'utilisateur (par exemple, la langue du document, le format d'image ou l'encodage à utiliser\
pour le contenu).

![Texte alternatif](https://developer.mozilla.org/fr/docs/Web/HTTP/Content_negotiation/httpnego.png)

## l’entête de la réponse pour : http://dev.local/

HTTP/1.1 200 OK\
Date: Tue, 03 Sep 2024 09:34:28 GMT\
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12\
Content-Length: 1221\
Content-Type: text/html;charset=UTF-8

## l’entête de la réponse pour : http://dev.local/notExisting

HTTP/1.1 404 Not Found\
Date: Tue, 03 Sep 2024 09:37:07 GMT\
Server: Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12\
Content-Length: 295\
Content-Type: text/html; charset=iso-8859-1

## Headers (Principaux En-têtes de Requête HTTP)

| **En-tête**            | **Description**                                                      | **Exemple**                                    | **Rôle**                                               |
|-------------------------|----------------------------------------------------------------------|------------------------------------------------|--------------------------------------------------------|
| `Host`                  | Spécifie le nom d'hôte et le port du serveur auquel la requête est envoyée. | `Host: dev.local`                             | Permet au serveur de savoir à quel hôte la requête est destinée, essentiel pour le routage en virtual hosting. |
| `User-Agent`            | Identifie le client (navigateur ou autre logiciel) qui envoie la requête. | `User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36` | Permet au serveur de connaître le type de client et d'adapter la réponse en conséquence. |
| `Accept`                | Indique les types de contenu que le client peut traiter.              | `Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8` | Aide le serveur à choisir le format de réponse préféré par le client. |
| `Accept-Language`       | Spécifie les langues que le client préfère pour la réponse.            | `Accept-Language: en-US,en;q=0.5`             | Permet au serveur de répondre dans la langue préférée du client si disponible. |
| `Accept-Encoding`       | Indique les encodages de contenu que le client peut comprendre.        | `Accept-Encoding: gzip, deflate, br`          | Permet au serveur de compresser la réponse pour économiser la bande passante. |
| `Connection`            | Spécifie si la connexion doit être maintenue ou fermée après la réponse. | `Connection: keep-alive`                      | Permet au client et au serveur de déterminer si la connexion HTTP doit rester ouverte pour d'autres requêtes/réponses. |
| `Authorization`         | Fournit les informations d'identification pour l'accès protégé.       | `Authorization: Basic dXNlcjpwYXNzd29yZA==` | Envoie des informations d'authentification pour accéder à des ressources protégées. |
| `Cache-Control`         | Spécifie les directives de mise en cache pour la requête.             | `Cache-Control: no-cache`                     | Contrôle le comportement de mise en cache, par exemple, demander à ne pas utiliser le cache. |
| `If-Modified-Since`      | Indique que la réponse doit être envoyée seulement si le fichier a été modifié après une date spécifique. | `If-Modified-Since: Wed, 21 Oct 2023 07:28:00 GMT` | Permet au client de recevoir la réponse uniquement si le contenu a changé depuis une certaine date. |
| `Referer`               | Indique la page d'origine de la requête, c'est-à-dire la page qui a mené à la requête actuelle. | `Referer: http://example.com/page`           | Permet au serveur de connaître la provenance de la requête, utile pour les analyses de trafic. |
| `Cookie`                | Envoie les cookies stockés sur le client au serveur.                  | `Cookie: sessionId=abc123; userId=78910`     | Permet au serveur de maintenir l'état de session utilisateur et d'autres informations persistantes. |

## Sources

https://www.ionos.fr/digitalguide/sites-internet/developpement-web/get-vs-post/

https://developer.mozilla.org/fr/docs/Web/HTTP/Overview

https://developer.mozilla.org/fr/docs/Web/HTTP/Status

https://developer.mozilla.org/fr/docs/Web/HTTP/Content_negotiation

https://developer.mozilla.org/fr/docs/Web/HTTP/Headers