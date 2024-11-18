app.component('ajoutTache',{
    template:`
    <div class="input-group">
        <input v-model="nouveaut" placeholder="Nouvelle tâche" class="form-control" />
            <div class="input-group-append">
                <button class="btn btn-primary" @click="add">Ajouter</button>
            </div>
    </div>`,
    data()
    {
        return{
            nouveaut:''
        };
    },
    methods:{
        add()
        {
            if(this.nouveaut.trim()!=='')
            {
                this.$emit('add',this.nouveaut);
                this.nouveaut='';
            }
        }
    }
}

);