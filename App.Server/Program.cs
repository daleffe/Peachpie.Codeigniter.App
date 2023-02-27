using System;
using Microsoft.AspNetCore;
using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Rewrite;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;

namespace App.Server
{
    internal class Program
    {
        static void Main(string[] args)
        {
            var host = WebHost.CreateDefaultBuilder(args)
                .UseStartup<Startup>()
                .Build();

            host.Run();
        }
    }

    internal class Startup
    {
        public void ConfigureServices(IServiceCollection services)
        {
            // Adds a default in-memory implementation of IDistributedCache.
            services.AddDistributedMemoryCache();

            services.AddSession(options =>
            {
                options.IdleTimeout = TimeSpan.FromMinutes(30);
                options.Cookie.HttpOnly = true;                
                options.Cookie.IsEssential = true;
            });

            services.AddPhp(options =>
            {
                options.Session.AutoStart = false;
            });
        }

        public void Configure(IApplicationBuilder app, IWebHostEnvironment env)
        {
            if (env.IsDevelopment())
            {
                app.UseDeveloperExceptionPage();
            }

            RewriteOptions rewriteOptions = new();

            rewriteOptions.AddRewrite(@"^(favicon\.ico)$", "assets/ico/$1", skipRemainingRules: true);
            rewriteOptions.AddRewrite(@"^assets/(.*)/(.*)$", "assets/$1/$2", skipRemainingRules: true);
            rewriteOptions.AddRewrite(@"^(.*)$", "index.php/$1", skipRemainingRules: true);

            app.UseRewriter(rewriteOptions);

            app.UseSession();

            app.UsePhp("/");

            app.UseDefaultFiles();
            app.UseStaticFiles();
        }
    }
}
