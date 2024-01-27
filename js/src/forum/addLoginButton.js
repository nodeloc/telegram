import {extend} from 'flarum/extend';
import LogInButtons from 'flarum/components/LogInButtons';
import app from 'flarum/app';

export default function () {
    extend(LogInButtons.prototype, 'items', function (items) {
            const authUrl = app.forum.attribute('baseUrl') + '/auth/telegram';
            // Replace the TelegramProvide widget script
            items.add('nodeloc-telegram',
                m('script', {
                    async: true, src: 'https://telegram.org/js/telegram-widget.js?22',
                    'data-telegram-login': 'nodeloc_bot',
                    'data-size': 'large',
                    'data-radius': '10',
                    'data-auth-url': authUrl,
                    'data-request-access': 'write'
                })
            );
    });
}
