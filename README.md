# Instabook : partage de photos avec des groupes d'ami. 

## Contexte
L'objectif de cette application est de pouvoir créer des groupes d'amis, poster des photos accessibles par le groupe. 
Pour chaque photo, on peut "tagger" les membres du groupe qui y apparaissent. Chaque photo peut-être commentée par un membre du groupe, et chaque membre du groupe peut répondre à un commentaire. 

## Étape de réalisation 

### Migrations
Je n'ai pas eu de problèmes particuliers dans cette étape, mise à part a group_user car je n'avais pas fait un modèle pivot, après avoir modifié cela, j'ai réussi à passer tous les tests A.
Pour les tests B, j'ai juste eu un soucis avec la duplication des clés, j'avais bien mis le unique dans les tables mais cela ne le prennait pas en compte. J'ai donc continué sur les relations modèles et cela en a validé certaines sauf une. Après en avoir discuter avec le professeur, il a remarqué une erreur dans les tests avec le $this->seed(); 
Je l'ai commenté et cela à marcher.

### Relations Models
Pour les relations simples j'ai eu quelques difficultés avec la relation reflexive, en effet nous ne l'avions pas vu, alors j'ai cherché sur internet et dans la doc et j'ai finalement réussi à trouver ce qu'il fallait écrire. De plus j'ai bien lu les tests pour savoir comment je devais appeller la fonction et voir les relations qu'il fallait utiliser cela m'a beaucoup aidé même si je gardais à côté de moi le projet todo pour m'aider.
Pour les relations plus complexes j'ai eu le soucis avec le seeders, j'avais bien fait les bonnes relations mais les tests ne passaient pas, laors j'ai fait un 'php artisan migrate:fresh --seed' et là tous mes tests sont passés.

### Règles de gestion
Le point le plus compliqué pour moi a été celui des règles de gestions.
C'est la partie que j'avais le moins compris sur le projet todo.
J'ai bien compris la fonction boot mais j'étais perdu pour savoir ce qu'il fallait mettre dedans.
J'ai fait plusieurs tests pour que l commentaire ne peut être fait que par un utilisateur qui appartient au même groupe que la photo.
J'ai essayé de récupèrer l'id du groupe de la photo pour le comparé à l'id du groupe de l'utilisateur mais ce n'était pas la bnne méthode.
J'ai regardé à nouveau ce qu'on a fait sur le todo pour m'inspirer, j'avais bien le début mais il fallait utiliser le find mais je ne savais pas comment.
J'ai finalement réussi avec votre aide et cela m'a permis de comprendre et de réussir les autres.