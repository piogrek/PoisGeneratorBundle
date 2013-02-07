
    /**
     * Finds and displays a {{ entity }} entity.
     *
{% if 'annotation' == format %}
     * @Route("/{id}/show", name="{{ route_name_prefix }}_show")
     * @Template()
{% endif %}
     */
    public function showAction($id)
    {

        $entity = $this->get('g_service.{{ entity }}')->get($id);

{% if 'delete' in actions %}
        $deleteForm = $this->createDeleteForm($id);
{% endif %}

{% if 'annotation' == format %}
        return array(
            'entity'      => $entity,
{% if 'delete' in actions %}
            'delete_form' => $deleteForm->createView(),
{% endif %}
        );
{% else %}
        return $this->render('{{ bundle }}:{{ entity|replace({'\\': '/'}) }}:show.html.twig', array(
            'entity'      => $entity,
{% if 'delete' in actions %}
            'delete_form' => $deleteForm->createView(),
{%- endif %}
        ));
{% endif %}
    }
