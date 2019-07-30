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
                                                <div v-for="(item, id) in cards" :key="id">
                                                      <div class="card-body" @click="newModal(item.id)" style="background:#F7F7F7;cursor:pointer;" v-if="item.item_id == card.id && item.list_id == list.id">
                                                            <h3 class="card-title">{{item.title}}</h3>

                                                            <!-- Modal -->
                                                            <div class="modal fade" :id="'addNew' + item.id" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                              <div class="modal-header">
                                                                                    <h5 class="modal-title">{{item.title}}</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                          <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                              </div>
                                                                              <div class="modal-body">
                                                                                    {{item.description}}
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <items-form :data-list="list.id" :data-card="card.id" @newItem="items.push($event)"></items-form>
                                          </div>
                                    </draggable>
                                    <cards-form :data-list="list.id" @newCard="cards.push($event)"></cards-form>
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
import CardsForm from './CardsForm.vue'
import ItemsForm from './ItemsForm.vue'

export default {

      components: {ListsForm, Draggable, CardsForm, ItemsForm},
      props: ['dataLists', 'dataCards', 'dataBoard', 'dataItem'],

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
      methods: {
            newModal(id) {
                  $('#addNew' + id).modal('show');
            }
      }
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
