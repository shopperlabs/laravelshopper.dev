<p align="center"><img src="https://github.com/shopperlabs/art/blob/main/logo.svg" width="400" alt="Laravel Shopper Logo" /></p>

## Laravel Shopper Website

This is the source of the official [Laravel Shopper][site].

## Local Development

If you want to work on this project on your local machine, you may follow the instructions below. 
These instructions assume you are serving the site using [Laravel Valet](https://laravel.com/docs/valet) or [Laravel Herd](https://herd.laravel.com/) out of your `~/Sites` directory:

1. Fork this repository
2. Open your terminal and `cd` to your `~/Sites` folder
3. Clone your fork into the `~/Sites/laravelshopper.dev` folder, by running the following command with your username placed into the {username} slot:
   ```bash
    git clone git@github.com:{username}/laravelshopper.dev laravelshopper.dev
    ```
4. CD into the new directory you just created.
5. Run the `setup.sh` bin script, which will take all the steps necessary to prepare your local installation:
    ```bash
    ./bin/setup.sh
    ```

### Torchlight Integration

This project relies on Torchlight for syntax highlighting. You will need to create an account at [torchlight.dev](https://torchlight.dev/) and generate a free personal token for use in this project. Once generated, add your token to your .env file:

```ini
TORCHLIGHT_TOKEN=your-torchlight-token
```

### Syncing Upstream Changes Into Your Fork

This [GitHub article](https://help.github.com/en/articles/syncing-a-fork) provides instructions on how to pull the latest changes from this repository into your fork.

### Updating After Remote Code Changes

If you pull down the upstream changes from this repository into your local repository, you'll want to update your Composer and NPM dependencies, as well as update your documentation branches. For convenience, you may run the `bin/update.sh` script to update these things:

```bash
./bin/update.sh
```

## Important Links

- [Shopper Main Site][site]
- [Shopper Documentation][docs]
- [Shopper Framework][app-repo] (that we maintain)
- [Shopper Discord][discord]

[site]: https://laravelshopper.dev
[docs]: https://laravelshopper.dev/docs
[discord]: https://laravelshopper.dev/discord
[contribution]: https://github.com/shopperlabs/shopper/blob/main/CONTRIBUTING.md
[app-repo]: https://github.com/shopperlabs/shopper
