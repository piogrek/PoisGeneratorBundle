
    /**
     * Edits an existing {{ entity }} entity.
     *
{% if 'annotation' == format %}
     * @Route("/{id}/update", name="{{ route_name_prefix }}_update")
     * @Method("POST")
     * @Template("{{ bundle }}:{{ entity }}:edit.html.twig")
{% endif %}
     */
    public function updateAction(Request $request, $id)
    {

        $entity = $this->get('g_service.{{ entity }}')->get($id);

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new {{ entity_class }}Type(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $this->get('g_service.{{ entity }}')->save($entity);
            $this->get('session')->getFlashBag()->add('notice', 'Object #'.$entity->getId().' successfully updated.');
            return $this->redirect($this->generateUrl('{{ route_name_prefix }}_edit', array('id' => $id)));
        }

{% if 'annotation' == format %}
        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
{% else %}
        return $this->render('{{ bundle }}:{{ entity|replace({'\\': '/'}) }}:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
{% endif %}
    }
