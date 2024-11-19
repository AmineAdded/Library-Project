const app=Vue.createApp({
    data(){
        return{
            taches:[
                {id:1,titre:'premiere tache'},
                {id:2,titre:'deuxieme tache'}
            ]
        };

    },
    methods:{
        ajouter(nomTache)
        {
            if(nomTache.trim()!=='')
            {
                const nouveaut={id: this.taches.length +1,titre: nomTache};
                this.taches.push(nouveaut);
            }
            
        },
        supprimer(idTache)
        {
            this.taches=this.taches.filter(taches=>taches.id!==idTache);
        }
    }
}
);

