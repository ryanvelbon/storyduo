
Something similar to [this website](https://www.theitalianexperiment.com/stories/chicken-little).

# UI
- [Buttons](https://getcssscan.com/css-buttons-examples)
- Flag icons taken from [Icon Pack - Square Country Simple Flags](https://www.flaticon.com/packs/square-country-simple-flags)



Create sample data (optional)

    $ php artisan db:demo


Cache Blade Icons for better performance.

    $ php artisan icon:cache


[Why are my images not loading?](https://filamentphp.com/community/danharrin-file-previews-not-loading)

`APP_URL` should match the domain you're using.

Additionally run:

    $ php artisan storage:link

You should have a `user.jpg` file in `storage/app/public`. This will be used as a fallback image for users without an avatar.
