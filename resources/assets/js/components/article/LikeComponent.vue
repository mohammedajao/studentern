<template lang="html">
        <footer>
          <ul class="stats float-right" style="">
            <li style="">
              <a @click.prevent="activateLike(articleId)" href=""  :class="{'like-btn-hoverable': liked == 0, 'like-btn-link': true, 'like-button': true, 'like-button-blue': liked == 1, 'like-button-dislikeable': liked == 1, 'like-button-hoverable': liked == 0}">
                <span class="d-none">Like</span>
                <i class="fas fa-heart" style=""></i>
              </a>
              <span :id="'article-like-count-' + articleId">{{ likeCount }}</span>
            </li>
          </ul>
        </footer>
</template>

<script>
export default {
  props: ['articleId', 'likes', 'userLiked'],
  data () {
    return {
      liked: this.userLiked,
      likeCount: parseInt(this.likes)
    }
  },
  methods: {
    activateLike (articleId) {
      axios.post('/likes',{id: articleId
      }).then((response)=>{
          this.liked = response.data['like']['like_type'] == 'like' ? 1 : 0;
          this.likeCount += response.data['like']['like_type'] == 'like' ? 1 : -1;
      }).catch((error)=>{
          console.log(error.response.data)
      });
      //   type: 'POST',
      //   url: 'likes',
      //   headers: {
      //     'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
      //   },
      //   id: articleId
      // }).then(response => {
      //   console.log(response.data)
      // }).catch(function(error) {
      // })
    },
    animateFrontEnd () {

    }
  },
  created () {
    console.log(this.userLiked)
    let token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
  }
}
</script>

<style lang="css">
</style>
