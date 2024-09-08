const emojis = ['💡', '🚀', '🔥', '🎯', '💼', '📝', '🤖', '📈', '🔔', '🎉'];

function getRandomEmoji() {
    return emojis[Math.floor(Math.random() * emojis.length)];
}

const beforeEmoji = document.querySelector('.emoji.before');
const afterEmoji = document.querySelector('.emoji.after');

function addRandomEmojis() {
    beforeEmoji.textContent = getRandomEmoji();
    afterEmoji.textContent = getRandomEmoji();
}

addRandomEmojis();
