$(document).ready(() => {
  $('.search-icon').on("click", () => {
    $('.search-input').css('transform', 'translate(-50%, 0%)')
  })
  $('#close-btn').on("click", () => {
    $('.search-input').css('transform', 'translate(-50%, -150%)')

  })
})