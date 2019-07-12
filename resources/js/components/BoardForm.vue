<template>
      <div>
            <button class="btn btn-lg btn-primary mb-4" @click="show=!show" >Créer un tableau</button>
            <form v-show="show" @submit.prevent="submitBoard">
                  <div class="form-group">
                        <label>Titre</label>
                        <input type="text" class="form-control" v-model="form.title"/>
                        <p class="text-danger" v-if="errors.title" v-text="errors.title[0]">More example invalid feedback text</p>
                  </div>
                  <div class="form-group">
                        <label>Sous-Titre</label>
                        <input type="text" class="form-control" v-model="form.sub_title"/>
                        <p class="text-danger" v-if="errors.sub_title" v-text="errors.sub_title[0]">More example invalid feedback text</p>
                  </div>
                  <input type="text" v-model="form.user_id" id="user_id"/>
                  <button type="submit" class="btn btn-lg btn-success mb-4">Valider</button>
            </form>
            <div class="row">
                  <div v-for="board in orderedBoards" :key="board">
                        <div class="card" style="width: 18rem;margin:0 0 1rem 1rem;">
                              <div class="card-body">
                                    <h3 class="card-title">{{board.title}}</h3>
                                    <h6 class="card-subtitle mb-2 text-muted">{{board.sub_title}}</h6>
                              </div>
                              <hr/>
                              <div class="card-body">
                                    <a :href="'/boards/' + board.id">Voir</a>
                                    <a :href="'/boards/' + board.id + '/edit'">Éditer</a>
                              </div>
                        </div>
                  </div>
                  <p v-if="boards.length == 0">Aucun tableau actuellement</p>
            </div>
      </div>
</template>

<script>
export default {
      props: ['dataBoards'],
      data() {
            return {
                  show : false,
                  form: {
                        user_id: '',
                        title: '',
                        sub_title: ''
                  },
                  boards: this.dataBoards,
                  errors: {}
            }
      },
      computed: {
            orderedBoards: function () {
                  return _.orderBy(this.boards, 'id', 'desc')
            }
      },
      methods: {
            submitBoard() {
                  axios.post('/board', this.form)
                        .then(({data}) => {
                              this.boards.push(data)
                              this.form.title = '',
                              this.form.sub_title = '',
                              this.show = false
                        })
                        .catch(error => {
                              this.errors = error.response.data.errors
                        })
            }
      }
}
</script>
