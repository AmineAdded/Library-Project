app.component('listeTache',
    {
        props:['taches'],
        template:`                
        <ul class="list-group mb-3">
            <li v-for="tache in taches" :key="tache.id" class="list-group-item d-flex justify-content-between align-items-center">
                {{ tache.titre }}
                <button class="btn btn-danger btn-sm" @click="$emit('remove', tache.id)">Supprimer</button>
            </li>
        </ul>`
    }
);