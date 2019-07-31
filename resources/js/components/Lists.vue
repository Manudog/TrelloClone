<template>
      <div>
            <div class="row">
                  <draggable v-for="(list, id) in orderedLists" :key="id" group="lists" @start="drag=true" @end="drag=false">
                        <div class="list">
                              <div class="list-head">
                                    <h2>{{list.title}}</h2>
                                    <i class="fas fa-ellipsis-h"></i>
                              </div>
                              <draggable v-for="(card, id) in orderedCards" :key="id" group="cards" @start="drag=true" @end="drag=false">
                                    <div class="cards" v-if="card.list_id == list.id && card.item_id == NULL">
                                          <h3 class="card-title">{{card.title}}</h3>
                                          <div v-for="(item, id) in cards" :key="id">
                                                <div class="item" @click="newModal(item.id)" v-if="item.item_id == card.id && item.list_id == list.id">
                                                      <h3>{{item.title}}</h3>

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
