<template>
      <div>
            <div class="row">
                  <!-- <p>ID : {{dataBoard}}</p> -->
                  <draggable v-for="(list, id) in orderedLists" :key="id" group="lists" @start="drag=true" @end="drag=false">
                        <div class="card list" style="width: 18rem;margin:0 0 1rem 1rem;">
                              <div class="card-body">
                                    <h3 class="card-title">{{list.title}}</h3>
                                    <draggable v-for="(card, id) in orderedCards" :key="id" group="cards" @start="drag=true" @end="drag=false">
                                          <div class="card" style="margin:0 0 1rem 0;" v-if="card.list_id == list.id && card.item_id == NULL">
                                                <div class="card-body">
                                                      <h3 class="card-title">{{card.title}}</h3>
                                                </div>
                                          </div>
                                    </draggable>

                                    <button type="submit" class="add_card">Ajouter une carte</button>
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
      props: ['dataLists', 'dataCards', 'dataBoard'],

      data() {
            return {
                  lists: this.dataLists,
                  cards: this.dataCards
            }
      },
      computed: {
            orderedLists: function () {
                  return _.orderBy(this.lists, 'order_by', 'desc')
            },
            orderedCards: function () {
                  return _.orderBy(this.cards, 'order_by', 'desc')
            }
      },
}
</script>

<style>
.list {
      background: #F7F7F7;
}

.add_card {
      background: #CCCCCC;
      text-align: center;
      border: 0;
      display: block;
      padding: 5px 10px;
      width: 100%;
}
</style>
