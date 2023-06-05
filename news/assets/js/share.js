// Get the share-whatsapp element by its id
const shareButton = document.getElementById('share-whatsapp');

// Add a click event listener to the share button
shareButton.addEventListener('click', function() {
  // Construct the WhatsApp share link
  const shareText = encodeURIComponent('Check out this news from Industrial Times');
  const shareUrl = encodeURIComponent(window.location.href);
  const whatsappUrl = `https://api.whatsapp.com/send?text=${shareText}%0A${shareUrl}`;

  // Open WhatsApp in a new tab
  window.open(whatsappUrl);
});


// Get the share-facebook element by its id
const shareFacebookButton = document.getElementById('share-facebook');

// Add a click event listener to the Facebook share button
shareFacebookButton.addEventListener('click', function() {
  // Construct the Facebook share link
  const shareUrl = encodeURIComponent(window.location.href);
  const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;

  // Open Facebook in a new tab
  window.open(facebookUrl);
});


// Get the share-twitter element by its id
const shareTwitterButton = document.getElementById('share-twitter');

// Add a click event listener to the Twitter share button
shareTwitterButton.addEventListener('click', function() {
  // Construct the Twitter share link
  const shareText = encodeURIComponent('Check out this news from Industrial Times');
  const shareUrl = encodeURIComponent(window.location.href);
  const twitterUrl = `https://twitter.com/intent/tweet?text=${shareText}&url=${shareUrl}`;

  // Open Twitter in a new tab
  window.open(twitterUrl);
});
