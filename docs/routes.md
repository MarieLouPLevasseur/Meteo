# Routes

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
| ------------------------------------- | ----------- | ---------------------- | ---------- | ---------------- | ------------------------- | ------------------------------------------- |
| `/` | `GET` | `MainController` | `homepage` | homeshow | liste des villes pour la méto |  |
| `/mountain` | `GET` | `MountainController` | `mountainpage` | mountainshow | info montagne |  |
| `/beach` | `GET` | `BeachController` | `beachpage` | beachshow | info plage |  |
| `/city/add/{id}` | `GET` | `MainController` | `cityAdd` | cityAdd | ajout de la ville dans le widget | [i:id] is the city to add |
