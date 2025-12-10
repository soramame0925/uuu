( function ( wp ) {
    const { registerBlockType } = wp.blocks;
    const { createElement } = wp.element;
    const { useBlockProps } = wp.blockEditor;
    const ServerSideRender = wp.serverSideRender;

    registerBlockType( 'mno/highlights', {
        edit: function Edit() {
            return createElement(
                'div',
                useBlockProps(),
                createElement( ServerSideRender, { block: 'mno/highlights' } )
            );
        },
        save: function Save() {
            return null;
        },
    } );
} )( window.wp );
