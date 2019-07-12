<template>
      <div>
            <div class="row">
                  <!-- <p>ID : {{dataBoard}}</p> -->
                  <draggable v-for="(list, id) in orderedLists" :key="id" group="lists" @start="drag=true" @end="drag=false">
                        <div class="card list" style="width: 18rem;margin:0 0 1rem 1rem;">
                              <div class="card-body">
                                    <h3 class="card-title">{{list.title}}</h3>
                                    <a :href="'/cards/create/' + list.id" class="card-link">Ajouter une carte</a>
                                    
                              </div>
                        </div>
                  </draggable>
                  <lists-form :data-board="dataBoard" @newList="lists.push($event)"></lists-form>
            </div>
      </div>
</template>


<script>
import Draggable from 'vuedraggable';
import ListsForm from './ListsForm.vue'

export default {

      components: {ListsForm, Draggable},
      props: ['dataLists', 'dataBoard'],

      data() {
            return {
                  lists: this.dataLists
            }
      },
      computed: {
            orderedLists: function () {
                  return _.orderBy(this.lists, 'id', 'desc')
            }
      },
}
</script>

<style>
.list {
      background: #F7F7F7;
}
</style>
