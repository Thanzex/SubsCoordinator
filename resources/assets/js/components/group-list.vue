<template>
    <ul class="list-group">
      <li class="list-group-item p-2 inline">
        <div class="row">
          <div class="col">
            <button type="button" v-on:click="addUser" class="btn btn-success list-inline-item">&plus;</button>
            <button type="button" v-if="previous_1" @click="loadPrevious1" class="btn btn-info list-inline-item item">Carica precedente</button>
            <button type="button" v-if="previous_2" @click="loadPrevious2" class="btn btn-info list-inline-item item">Carica Team</button>
          </div>
          <div class="col-auto">
            <!-- <button type="button" class="btn btn-primary list-inline-item item">Crea</button> -->
          </div>
        </div>
      </li>
      <input type="hidden" name="groupNumber" :value="utenti.length">
      <draggable :list="utenti" :options="{animation:200, handle:'.handle'}" :element="'div'">
        <li v-for="(utente, index) in utenti" class="list-group-item p-2" v-bind:key="utente.v_id">
          <div class="input-group" style="z-index: 0;">
            <div class="input-group-prepend">
              <button type="button" v-on:click="removeUser(index)" class="btn btn-danger" >&times;</button>
            </div>
            <div class="input-group-append">
              <div class="input-group-text vue-group-append-number">
                <span class="">{{index+1}}</span>
              </div>
            </div>
            <div class="input-group-append select-width">
              <select v-model="utenti[index]" class="form-control selectpicker" name="groupMember[]" id="selector" :value="utente">
                <option v-for="user in users" :data-tokens="user.name + ' ' + user.surname + ' ' + user.nick" v-bind:key="user.nick">{{user.nick}}</option>
              </select>
            </div>

            <div class="input-group-append">
              <div class="input-group-text">
                <span class="handle">&equiv;</span>
              </div>
            </div>

          </div>

          <!-- <input type="hidden" name="groupMember":value="utente.nick"> -->
        </li>
      </draggable>

    </ul>

</template>

<script>
$(document).ready( function() {
  setWidth();
    new ResizeObserver(setWidth).observe(document.querySelector('.list-group')); //------------
   
    window.onresize = function() {
      setWidth();
    }

});



function setWidth() {
var total = $('.input-group').width();
var b1 = $('.input-group-prepend').width();
var b2 = $('.vue-group-append-number').outerWidth(true);
$('.select-width').width(total-(2*b1+b2));
}

import draggable from "vuedraggable";
export default {
  mounted() {
    this.utenti = (this.present)?this.present:[];
    var temp = this;
    this.$nextTick(function(){
      $(".input-group-append .selectpicker").each(  function(i) {
        console.log("Setting ",$(this)," to ",temp.utenti[i]);
        $( this ).selectpicker('val',temp.utenti[i]);
      });
    })
  },
  components: {
    draggable
  },
  props: ["present", "users", 'previous_1','previous_2'],
  data() {
    return {
      utenti: [],
      //csrf: document.head.querySelector('meta[name="csrf-token"]').content
    };
  },
  methods: {
    addUser: function() {
      //this.utenti.push(Vue.util.extend({}, this.nutente));
      this.utenti.push({name:"",nick:"",v_id:token()});
      this.$nextTick(function () {
        $('.selectpicker').selectpicker('refresh');
        setWidth();
      })

    },
    removeUser: function(index) {
      Vue.delete(this.utenti, index);
      this.$nextTick(function () {
        $('.selectpicker').selectpicker('refresh');
        setWidth();
      })
    },
    loadPrevious1: function() {
      this.utenti = this.previous_1;
      var temp = this;
      this.$nextTick(function(){
        $(".input-group-append .selectpicker").each(  function(i) {
          console.log("Setting ",$(this)," to ",temp.utenti[i]);
          $( this ).selectpicker('val',temp.utenti[i]);
        });
        $('.selectpicker').selectpicker('refresh');
        setWidth();
      })
    },
    loadPrevious2: function() {
      this.utenti = this.previous_2;
      var temp = this;
      this.$nextTick(function(){
        $(".input-group-append .selectpicker").each(  function(i) {
          console.log("Setting ",$(this)," to ",temp.utenti[i]);
          $( this ).selectpicker('val',temp.utenti[i]);
        });
        $('.selectpicker').selectpicker('refresh');
        setWidth();
      })
    }
  }
};

var rand = function() {
    return Math.random().toString(36).substr(2); // remove `0.`
};

var token = function() {
    return rand() + rand(); // to make it longer
};
</script>
