<template>
      <div>
            <div class="row">
                  <draggable v-for="(board, id) in orderedBoards" :key="id" group="boards" @start="drag=true" @end="drag=false">
                        <a :href="'/boards/' + board.id" class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
                              <div class="card-body">
                                    <h3 class="card-title">{{board.title}}</h3>
                                    <h6 class="card-subtitle mb-2 text-muted">{{board.sub_title}}</h6>
                              </div>
                              <!-- <hr/>
                              <div class="card-body">
                                    <a :href="'/boards/' + board.id">Voir</a>
                                    <a :href="'/boards/' + board.id + '/edit'">Éditer</a>
                              </div> -->
                        </a>
                  </draggable>
                  <boards-form @newBoard="boards.push($event)"></boards-form>
                  <!-- <p v-if="boards.length == 0">Aucun tableau actuellement</p> -->
            </div>
      </div>
</template>

<script>
import Draggable from 'vuedraggable';
import BoardsForm from './BoardsForm.vue'

export default {
      components: {BoardsForm, Draggable},
      props: ['dataBoards'],
      data() {
            return {
                  boards: this.dataBoards
            }
      },
      computed: {
            orderedBoards: function () {
                  return _.orderBy(this.boards, 'id', 'desc')
            }
      },
}
</script>
