use Filament\Support\Colors\Color;

public function panel(Panel $panel): Panel
{
    return $panel
        ->default()
        ->id('admin')
        ->path('admin')
        ->login()
        // Меняем основной цвет на фиолетовый или любой другой
        ->colors([
            'primary' => Color::Indigo,
            'gray' => Color::Slate,
        ])
        ->font('Inter') // Используем современный шрифт
        ->sidebarCollapsibleOnDesktop(); // Сворачиваемая боковая панель
}