<template>
    <ul class="list-group">
      <draggable :list="utenti" :options="{animation:200, handle:'.handle'}" :element="'div'">
        <li v-for="(utente, index) in utenti" class="list-group-item p-2">
          <div class="input-group">
            <div class="input-group-prepend">
              <button type="button" v-on:click="removeUser(index)" class="btn btn-danger" >&times;</button>
            </div>
            <input type="text" class="form-control" name="nick" id="nick" placeholder="Nick" :value="utente.nick">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="handle">&equiv;</span>
              </div>

            </div>
          </div>
        </li>
      </draggable>
    
      <li class="list-group-item p-2 inline">
        <div class="row">
          <div class="col">
            <button type="button" v-on:click="addUser" class="btn btn-success list-inline-item">&plus;</button>
            <button type="button" class="btn btn-info list-inline-item item">Carica precedente</button>
            <button type="button" class="btn btn-info list-inline-item item">Carica Team</button>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-primary list-inline-item item">Crea</button>
          </div>
        </div>


      </li>
    </ul>

    
</template>

<script>
import draggable from "vuedraggable";
export default {
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    draggable
  },
  props: ["group"],
  data() {
    return {
      nutente: {
        nick:"",
        pivot:{
          group_id:"",
          user_id:""
        }
      },
      utenti: this.group,
      csrf: document.head.querySelector('meta[name="csrf-token"]').content,
    };
  },
  methods: {
    addUser: function() {
      this.utenti.push(Vue.util.extend({}, this.nutente))
    },
    removeUser: function(index) {
      Vue.delete(this.utenti, index)
    },
  }
};
</script>
